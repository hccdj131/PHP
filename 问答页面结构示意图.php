<? php

class WendaPage extends BasicPage{
    public $content;

    public function getMainContent(){
        return $this->getLeftMenu().$this->content.$this->getRightMenu();
    }

    public function getLeftMenu(){
        return $this->global_menu.$this->my_menu;
    }

    public $global_menu;
    public $my_menu;

    public function getRightMenu(){
        return $this->new_question_button
        .$this->tags
        .$this->weekly_hot_question
        .$this->top_board;
    }
    public $new_question_button;
    public $tags;
    public $weekly_hot_question;
    public $top_board;
}


class TagPage extends WendaPage{
    public $content;

    public function getRightMenu(){
        return $this->new_question_button.$this->tags.$this->related_class;
    }
    public $related_class;
}
