<?php

/**
 * summary
 */
class CustomSession implements SessionHandlerInterface
{
    /**
     * summary
     */
    private $link;
    private $lifetime;

    public function open($savePath,$session_name)
    {
        $this->lifetime=get_cfg_var('session.gc_maxlifetime')
        $this->link=mysqli_connect('localhost','root','');
        mysqli_set_charset($this->link, 'utf8');
        mysqli_select_db($this->link,'test1');
        if($this->link){
            return true;
        }
        return false;
    }

    public function close()
    {
        mysql_close($this->link);
        return true; 
    }

    public function read($session_id)
    {
        $id=mysqli_escape_string($this->link,$session_id);
        $sql="SELECT * FROM sessions WHERE session_id='{$session_id}' AND session_expires>".time();
        mysqli_query($this->link,$sql);
        if(mysqli_num_rows($result)==1){
            return mysqli_fetch_assoc($result)['session_data'];
        }
        return '';
    }

    public function write($session_id,$session_data)
    {
        $newExp=time()+$this->lifetime;
        $session_id=mysqli_escape_string($this->link,$session_id);
        //首先查询是否存在指定的Session_id,如果存在相当于更新数据，否则是第一次，则写入数据
        $sql="SELECT * FROM sessions WHERE session_id='{$session_id}'";
        $result=mysqli_query($this->link,$sql);
        if(mysqli_num_rows($result)==1){
            $sql="UPDATE sessions SET session_expires='{$newExp}',session_data='{$session_data}' WHERE session_id='{$session_id}'";
            mysqli_query($this->link,$sql);
        }else{
            $sql="INSERT sessions VALUES('{$session_id}','$session_data','{$newExp}')";
        }
        mysqli_query($this->link,$sql);
        return mysqli_affected_rows($this->link)==1;
    }

    public function destroy($session_id)
    {
        $session_id=mysqli_escape_string($this->link,$session_id);
        $sql="DELETE FROM sessions WHERE session_id='{$session_id}'";
        mysqli_query($this->link,$sql);
        return mysqli_affected_rows($this->link)==1;
    }

    public function gc($maxlifetime)
    {
        $sql="DELETE FROM sessions WHERE session_expires<".time();
        mysqli_query($this->link,$sql);
        if(mysqli_affected_rows($this->link)>0){
            return true;
        }
        return false;
    }
}