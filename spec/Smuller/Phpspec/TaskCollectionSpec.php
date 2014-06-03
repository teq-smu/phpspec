<?php namespace spec\Smuller\Phpspec;

use Smuller\Phpspec\Task;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TaskCollectionSpec extends ObjectBehavior {

    public function it_is_initializable()
    {
        $this->shouldHaveType('Smuller\Phpspec\TaskCollection');
    }

    public function it_is_countable()
    {
        $this->shouldImplement('Countable');
    }

    public function it_throws_exception_if_added_element_is_not_a_task()
    {
        $this->shouldThrow('UnexpectedValueException')->duringAdd('NotATask');
    }

    public function it_adds_task_to_the_collection(Task $task1, Task $task2)
    {
        $this->add($task1);
        $this->tasks[0]->shouldBe($task1);

        $this->add($task2);
        $this->tasks[1]->shouldBe($task2);
    }

    public function it_can_accept_multiple_tasks_to_add_to_the_collection(Task $task1, Task $task2)
    {
        $tasks = [$task1, $task2];
        $this->add($tasks);
        $this->tasks->shouldBe($tasks);
    }

    public function it_counts_tasks_of_the_collection(Task $task)
    {
        $this->count()->shouldBe(0);

        $this->add($task);
        $this->count()->shouldBe(1);
    }
    
}
