<?php 
interface Workable
{
    public function work();
}
class Programmer implements Workable
{
    public function work()
    {
        return 'coding';
    }
}
class Tester implements Workable
{
    public function work()
    {
        return 'testing';
    }
}
class ProjectManagement
{
    public function process(Workable $member)
    {
        return $member->work();
    }
}

//khi muốn mở rộng thì chỉ cần tạo thêm các lớp khác implements từ lớp workable

?>