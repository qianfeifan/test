<?php
class DatabaceController extends Phalcon\Mvc\Controller {
public function insertAction()
{
    $users = new users();

    $users->name = 'liyi';
    $users->password='123';
    $users->email = 'liyi@qq.com';
   
    $ret = $users->save();

    if($ret){
        print_r('插入成功');
    } else {
        print_r('插入失败');
    }
}

public function deleteAction()
{
    $users = Users::findFirstByName('jack');
    if($users){
    $res = $users->delete();
    if($res) {
    print_r('删除成功');
    } else {
    print_r('删除失败');
    }
    } else {
    print_r('用户不存在');
    }
}

public function updateAction() {

    $Users       = new  Users();
    $Users->id   = 6;
    $Users->name = "lucy";
    $Users->password = "1234";
    $Users->email = "lucy@qq.com";
    //执行操作
    $ret = $Users->save();

    //对结果进行验证
    if ($ret) {
        echo "修改数据成功";
    } else {
        //如果插入失败处理打印报错信息
        echo "修改数据库失败了";
        foreach ($Users->getMessages() as $message) {
            echo $message->getMessage(), "<br/>";
        }
    }
}

}
?>