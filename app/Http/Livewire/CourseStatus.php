<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Course;
use App\Models\Lesson;

class CourseStatus extends Component
{
    public $course, $current, $index, $previous, $next;
    
    public function mount(Course $course){
        $this->course = $course;

        foreach($course->lessons as $lesson){
            if(!$lesson->completed){
              $this->current = $lesson;
              //indice
              $this->index = $course->lessons->search($lesson);

              $this->previous = $course->lessons[$this->index - 1];
              $this->next = $course->lessons[$this->index + 1];
              break;    
            }
        }
    }

    public function render()
    {
        return view('livewire.course-status');
    }

    public function changeLesson(Lesson $lesson)
    {
        $this->current = $lesson;
        $this->index = $this->course->lessons->pluck('id')->search($lesson->id);
    
        if($this->index==0){
            $this->previous = null;
        }else{
            $this->previous = $this->course->lessons[$this->index - 1];
        }
    
        if($this->index==$this->course->lessons->count()-1){
            $this->next = null;
        }else{
            $this->next = $this->course->lessons[$this->index + 1];
        }

        
        
    }

    public function getIndexProperty(){
        return $this->course->lessons->pluck('id')->search($this->current->id);
    }
    public function getPreviousProperty(){
        if($this->index==0){
            return null;
        }else{
           return $this->course->lessons[$this->index - 1];
        }

    }
    public function getNextProperty(){
        if($this->index== $this->course->lessons->count()-1){
            return null;
        }else{
            return $this->course->lessons[$this->index + 1];
        }
    }
}


