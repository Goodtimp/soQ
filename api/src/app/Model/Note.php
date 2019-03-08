<?php

/**
 * @author : goodtimp
 * @time : 2019-3-1
*/

namespace App\Model;

use PhalApi\Model\NotORMModel as NotORM;
use App\Common\Match;

class Note extends NotORM
{

    protected function getTableName($id)
    {
        return 'note';
    }

    /**
     * 根据用户id查找笔记
		 * @param userid 用户id
     */
    public function getNotesByUserId($userid, $num = 0)
    {
        $notes = $this->getORM()
            ->select('*')
            ->where('UserId', $userid)
            ->order("Id DESC");
        if ($num > 0) {
            $notes = $notes->limit($num);
        }
        return $notes;
    }

    /**
     * 根据笔记id查找笔记
		 * @param id 笔记id
     */
    public function getNoteById($id)
    {
        return $this->getORM()
            ->select('*')
            ->where('Id', $id)
            ->fetchAll();
    }

    /**
     * 根据分类Id查找笔记
		 * @param cateid 分类id
     * @param num 获取前几个
     */
    public function getNotesByCateId($cateid, $start = 0, $num = 0)
    {
        $res = $this->getORM()
            ->select('*')
            ->where('NoteCategoryId', $cateid)->order('Id DESC');
        if ($num == 0) return $res->fetchAll();
        else return $res->limit($start, $num)->fetchAll();
    }

    /**根据关键字查找用户笔记 */
    public function getNotesByKeywords($uid, $keys)
    {
        $s = Match::AllWordMatch($keys);
       
        $re = $this->getORM()->where("UserId", $uid);
       
        return $re->where("Content LIKE ? or Headline LIKE ?", $s,$s)
        ->order("Id DESC")->fetchAll();
    }
    /**统计用户笔记数量 */
    public function getCountByUserId($uid){
        $model = $this->getORM();
        return $model->where("UserId",$uid)->count("Id");
    }
    /**
		 * 获取笔记数量
		 */
    public function getCount()
    {
        $model = $this->getORM();
        return $model->count("Id");
    }

    /**
		 * 获取当前页的数据
		 * @param begin  开始位置
		 * @param length 获取数量
		 */
    public function getByLimit($begin, $length)
    {
        $model = $this->getORM();
        return $model->limit($begin, $length)->fetchAll();
    }


    /* --------------      数据库插入      ----------------- */

    public function insertOne($data)
    {
        $orm = $this->getORM();
        $data["DateTime"] = date('Y-m-d h:i:s', time());
        $orm->insert($data);
      
        // 返回新增的ID（注意，这里不能使用连贯操作，因为要保持同一个ORM实例）
        return $orm->insert_id();
    }

    /* --------------      数据库更新      ----------------- */

    public function updateOne($data)
    {
        $model = $this->getORM();
        $data["DateTime"] = date('Y-m-d h:i:s', time());
        return $model->where('Id', $data['Id'])->update($data);
    }

    /*
       数据库删除     
     */

    public function deleteOne($id)
    {
        $model = $this->getORM();
        return $model->where('Id', $id)->delete();
    }
}