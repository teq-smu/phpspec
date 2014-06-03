<?php namespace spec\Smuller\Phpspec;

use PhpSpec\ObjectBehavior;

class TaskSpec extends ObjectBehavior {

    public function let()
    {
        $this->beConstructedWith('Mail stuff');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Smuller\Phpspec\Task');
    }

    public function it_returns_title()
    {
        $this->getTitle()->shouldBe('Mail stuff');
    }

    public function it_can_be_rated()
    {
        $this->setRating(5);

        $this->getRating()->shouldBe(5);
    }

    public function it_throws_exception_if_rating_is_not_allowed()
    {
        $this->shouldThrow('InvalidArgumentException')->duringSetRating(8);
        $this->shouldThrow('InvalidArgumentException')->duringSetRating(-2);
        $this->shouldThrow('InvalidArgumentException')->duringSetRating('NotAllowed');
        $this->shouldThrow('InvalidArgumentException')->duringSetRating(true);
        $this->shouldThrow('InvalidArgumentException')->duringSetRating([]);
    }
    
}
