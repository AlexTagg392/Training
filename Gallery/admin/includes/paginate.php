<?php

    class Paginate {
        public $current_page;
        public $item_per_page;
        public $item_total;

        public function __construct($page=1, $item_per_page=10, $item_total=0) {
            $this->current_page = (int)$page;
            $this->item_per_page = (int)$item_per_page;
            $this->item_total = (int)$item_total;

        }

        public function next() {
            return $this->current_page + 1;
        }

        public function previous() {
            return $this->current_page - 1;
        }

        public function page_total() {
            return ceil($this->item_total/$this->item_per_page);
        }

        public function has_previous() {
            return $this->previous() >= 1;
        }

        public function has_next() {
            return $this->next() <= $this->page_total();
        }

        public function offset() {
            return ($this->current_page - 1 ) * $this->item_per_page;
        }
    }
?>