<?php namespace Smuller\Phpspec;

use Countable;
use UnexpectedValueException;

class TaskCollection implements Countable {

    public $tasks;

    public function __construct()
    {
        $this->tasks = [];
    }

    public function count()
    {
        return count($this->tasks);
    }
    
    public function add($task)
    {
        if (is_array($task))
        {
            return array_map([$this, 'add'], $task);
        }

        if ( ! $task instanceof Task)
        {
            throw new UnexpectedValueException('Argument passed must be a Igniweb\Phpspec\Task object');
        }
        $this->tasks[] = $task;
    }

}
