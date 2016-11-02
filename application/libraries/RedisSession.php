<?php
/**
 * Created by PhpStorm.
 * User: erb398wei
 * Date: 16/9/27
 * Time: 18:38
 */
class RedisSession implements \SessionHandlerInterface {
    private $redis;
    private $keyPrefix;
    private $maxLifetime;
    /**
     * Let's get this redis party started.
     *
     * @param Predis\Client $redis     The Predis Client
     * @param string        $keyPrefix The Redis Key prefix
     */
    public function __construct(Client $redis, $keyPrefix = 'session:') {
        $this->redis = $redis;
        $this->keyPrefix = $keyPrefix;
        // We want to just use
        $this->maxLifetime = ini_get('session.gc_maxlifetime');
    }

    /**
     * We don't need to do anything extra to initialize the session since
     * we get the Redis connection in the constructor.
     *
     * @param  string $savePath The path where to storethe session.
     * @param  string $name     The session name.
     */
    public function open($savePath, $name) { }
    /**
     * Since we use Redis EXPIRES, we don't need to do any special garbage
     * collecting.
     *
     * @param  string $maxLifetime The max lifetime of a session.
     */
    public function gc($maxLifetime) { }

    /**
     * Close the current session by disconnecting from Redis.
     */
    public function close() {
        // This will force Predis to disconnect.
        unset($this->redis);
    }

    /**
     * Destroys the session by deleting the key from Redis.
     *
     * @param  string $sessionId The session id.
     */
    public function destroy($sessionId) {
        $this->redis->del($this->keyPrefix.$sessionId);
    }
    /**
     * Read the session data from Redis.
     *
     * @param  string $sessionId The session id.
     * @return string            The serialized session data.
     */
    public function read($sessionId) {
        $sessionId = $this->keyPrefix.$sessionId;
        $sessionData = $this->redis->get($sessionId);
        // Refresh the Expire
        $this->redis->expire($sessionId, $this->maxLifetime);
        return $sessionData;
    }

    /**
     * Write the serialized session data to Redis. This also sets
     * the Redis key EXPIRES time so we don't have to rely on the
     * PHP gc.
     *
     * @param  string $sessionId   The session id.
     * @param  string $sessionData The serialized session data.
     */
    public function write($sessionId, $sessionData) {
        $sessionId = $this->keyPrefix.$sessionId;
        // Write the session data to Redis.
        $this->redis->set($sessionId, $sessionData);
        // Set the expire so we don't have to rely on PHP's gc.
        $this->redis->expire($sessionId, $this->maxLifetime);
    }
}