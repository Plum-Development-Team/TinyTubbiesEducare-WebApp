<?php

define("READ", 1);
define("UNREAD", 0);

class Message extends Table
{
    public function __construct()
    {
        parent::__construct("message", "Message");
    }

    public function send($content, $sender, $receiver)
    {
        return $this->exec(false, "INSERT INTO message (content, sent_by, sent_to) VALUES (?,?,?)", "sii", $content, $sender, $receiver);
    }

    /**
     * @param $seen
     * @param $receiver
     * @return Message[]|null
     */
    public function get($seen, $receiver)
    {
        return $this->exec(true, "SELECT * FROM message WHERE seen = ? AND sent_by = ?", "ii", $seen, $receiver);
    }


    public function messages($sender, $receiver, $order = 'ASC', $limit = null)
    {
        $query = "sent_to = ? and sent_by = ? OR sent_to = ? and sent_by = ? ORDER BY timestamp $order";
        if (isset($limit)) {
            return $this->getWhere("$query LIMIT ?", "iiiii", $receiver, $sender, $sender, $receiver, $limit);
        } else return $this->getWhere("$query;", "iiii", $receiver, $sender, $sender, $receiver);
    }


    public static function seen($reader, $sender, $message = null)
    {
        $find = $message ? " AND id = $message;" : ';';
        return self::query("UPDATE message SET seen = 1 WHERE sent_to = $reader AND sent_by = $sender $find");
    }

    public static function count($seen, $sender, $receiver)
    {
        return self::query("SELECT COUNT(*) as value FROM message WHERE seen = $seen  AND sent_by = $sender AND sent_to = $receiver;", "stdClass", false);
    }

    public static function notifications($receiver, $is_seen = 0)
    {
        return self::query("SELECT sent_by, (SELECT fullname FROM user WHERE id = sent_by) as sender, COUNT(DISTINCT id) as count FROM message WHERE seen = $is_seen AND sent_to = $receiver GROUP BY sent_by");
    }

}