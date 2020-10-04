<?php
class GroupMessage extends Table{

    public $count;

    public function __construct(){
        parent::__construct("group_message", "GroupMessage");
    }

    public function send($sender, $message, $group){
        //check if group_chat exists
        return $this->exec(false, "INSERT INTO $this->table_name (sent_by, content, group_chat) VALUES (?,?,?)", "isi", $sender, $message, $group);
    }

    public function get($seen, $group_chat){
        return $this->exec(true, "SELECT *, COUNT(id) as count FROM message WHERE seen = ? AND sent_to = ?", "iis", $seen, $group_chat);
    }

    public function group_chat_message($sender, $group_chat, $order = 'ASC', $limit = null){
        $query = "sent_by = ? and group_chat = ? OR sent_by = ? and group_chat = ? ORDER BY timestamp $order";
        if (isset($limit)) {
            return $this->getWhere("$query LIMIT ?", "iiiii", $sender, $group_chat, $sender, $group_chat, $limit);
        } else return $this->getWhere("$query;", "iiii", $sender, $group_chat, $sender, $group_chat);
    } 

    public static function get_messages_for($group, $limit = null, $order = 'ASC'){
        $query = <<<sql
        SELECT sent_by, fullname, content, group_chat, group_type AS group_name, time_sent AS timestamp
        FROM user AS u JOIN group_message AS gm on sent_by = u.id 
        JOIN group_chat AS g ON g.id = gm.group_chat 
        WHERE gm.group_chat = $group
        ORDER BY timestamp $order
        sql;
        return isset($limit) ? self::query("$query LIMIT $limit;") : self::query("$query;");
    }

    public static function seen($group_chat, $sender, $message = null){
        $find = $message ? " AND id = $message;" : ';';
        return self::query("UPDATE group_message SET seen_by = 1 WHERE sent_by = $sender AND group_chat = $group_chat $find");
    }

    public static function count($seen){
        return self::query("SELECT id, COUNT(*) as value FROM group_message WHERE seen_by = $seen GROUP BY id");
    }

    public static function notifications($group_chat, $is_seen = 0){
        return self::query("SELECT sent_by, (SELECT fullname FROM user WHERE id = sent_by) as sender, COUNT(DISTINCT id) as count FROM group_message WHERE seen_by = $is_seen AND group_chat = $group_chat GROUP BY sent_by");
    }

}

?>