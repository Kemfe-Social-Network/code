<?php
class Pagination {

	public $current_page;
	public $per_page;
	public $total_count;


	public function __construct($page=1, $per_page=20, $total_count=0){
		$this->current_page = (int)$page;
		$this->per_page = (int)$per_page;
		$this->total_count = (int)$total_count;

	}

	public function offset() {
		// Assuming 20 items per page:
		// page 1 has an offset of 0    (1-1) * 20
		// page 2 has an offset of 20   (2-1) * 20
		//   in other words, page 2 starts with item 21
		return ($this->current_page - 1) * $this->per_page;
	}

	public function total_pages() {
		$t = ceil($this->total_count/$this->per_page);
		if ($t < 1) {
			$t = 1;
		}

		return $t;
	}


	public function tidy_up_paginate(){

		if ($this->current_page < 1) {
			$this->current_page = 1;
		} else if ($this->current_page > $this->total_pages()){
			$this->current_page = $this->total_pages();
		}

	}

	public function previous_page() {
		return $this->current_page - 1;
	}

	public function next_page() {
		return $this->current_page + 1;
	}

	public function has_previous_page() {
		return $this->previous_page() >= 1 ? true : false;
	}

	public function has_next_page() {
		return $this->next_page() <= $this->total_pages() ? true : false;
	}

	public function paginateCtrls(){
		$pageCtrls = "";
		if ($this->total_pages() != 1) {


			if ($this->current_page > 1) {

				$pageCtrls .= '<li><a href="'.$_SERVER['PHP_SELF'].'?page='.$this->previous_page().'"><i class="fa fa-arrow-circle-o-left panav"></i></a></li> &nbsp; ';

				for ($i = $this->current_page-4; $i < $this->current_page; $i++){
					if ($i > 0){
						$pageCtrls .= '<li><a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.$i.'</a></li> &nbsp;  ';
					}
				}
			}

			$pageCtrls .= '<li class="active"><a>'.$this->current_page.'</a></li> &nbsp; ';

			for ($i = $this->current_page+1; $i <= $this->total_pages(); $i++){
				$pageCtrls .= '<li><a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.$i.'</a></li> &nbsp;  &nbsp;';

				if ($i >= $this->current_page+4) {
					break;
				}
			}

			if ($this->current_page != $this->total_pages()) {

				$pageCtrls .= '<li><a href="'.$_SERVER['PHP_SELF'].'?page='.$this->next_page().'"><i class="fa fa-arrow-circle-o-right panav"></i></a></li> &nbsp;  &nbsp;';

			}

		}
		return $pageCtrls;
	}

}
