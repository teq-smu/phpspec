<?php namespace spec\Smuller\Phpspec;

use Smuller\Phpspec\Task;
use Smuller\Phpspec\TaskCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TodoListSpec extends ObjectBehavior {

    public function it_is_initializable()
    {
        $this->shouldHaveType('Smuller\Phpspec\TodoList');
    }

    public function it_adds_a_task_to_the_list(TaskCollection $taskCollection, Task $task)
    {
        $taskCollection->add($task)->shouldBeCalledTimes(1);
        $this->taskCollection = $taskCollection;

        $this->addTask($task);
    }

    public function it_checks_whether_it_has_any_tasks(TaskCollection $taskCollection)
    {
        $taskCollection->count()->willReturn(0);
        $this->taskCollection = $taskCollection;
        $this->hasTasks()->shouldBeFalse();

        $taskCollection->count()->willReturn(20);
        $this->taskCollection = $taskCollection;
        $this->hasTasks()->shouldBeTrue();
    }

    public function getMatchers()
    {
        return [
            'beTrue' => function($subject)
            {
                return $subject === true;
            },
            'beFalse' => function($subject)
            {
                return $subject === false;
            },
        ];
    }
    
}
