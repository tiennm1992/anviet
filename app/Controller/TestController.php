<?php

class TestController extends AppController {

    public $current_location = array();
    public $pass_location = array();
    public $input = array();
    public $trace_snack = array();
    public $direction = 1;
    public $turn_left = 0;

    public function beforeFilter() {
        $this->Auth->allow();
    }
    public function a() {
        phpinfo();die;
    }

    public function index() {
        $input = array();
        for ($i = 1; $i < 9; $i++) {
            for ($j = 1; $j < 9; $j++) {
                $input[$j][$i] = 0;
            }
        }
        $input[5][2] = 1;
        $input[4][5] = 1;
        $input[1][6] = 1;
        $current_location_x = 1;
        $current_location_y = 1;
        $trace_snack = array();
        $this->input = $input;
        $reponse = $this->go($current_location_x, $current_location_y);
        echo '<style>table, th, td { border: 1px solid black;}"</style>';
        echo '<table >';
        for ($i = 1; $i < 9; $i++) {
            echo '<tr>';
            for ($j = 1; $j < 9; $j++) {
                if ($this->input[$j][$i] == 2) {
                    echo '<td>Pass</td>';
                } elseif ($this->input[$j][$i] == 5) {
                    echo '<td>End</td>';
                } elseif ($this->input[$j][$i] == 1) {
                    echo '<td>||||</td>';
                } else {
                    echo '<td>---</td>';
                }
            }
            echo '</tr>';
        }
        echo '</table>';
        die;
    }
             
    public function go($current_location_x, $current_location_y) {
        $this->trace_snack[] = array(
            $current_location_x => array(
                $current_location_y
            )
        );
        //direction 1 xuong 2 sang trai 3 len 4 sang phai
        switch ($this->direction) {
            case 1:
                $add_x = 0;
                $add_y = 1;
                $left_x = 1;
                $left_y = 0;
                break;
            case 2:
                $add_x = 1;
                $add_y = 0;
                $left_x = 0;
                $left_y = -1;
                break;
            case 3:
                $add_x = 0;
                $add_y = -1;
                $left_x = -1;
                $left_y = 0;
                break;
            case 4:
                $add_x = -1;
                $add_y = 0;
                $left_x = 0;
                $left_y = 1;
                break;
        }
//        if (($current_location_x + $add_x) > 8 || ($current_location_x + $add_x) < 0 || ($current_location_y + $add_y) > 8 || ($current_location_y + $add_y) < 0) {
//            $this->input[$current_location_x][$current_location_y] = 5;
//            return array();
//        };
        //condtions
        $cond1 = isset($this->input[$current_location_x + $add_x][$current_location_y + $add_y]) ? $this->input[$current_location_x + $add_x][$current_location_y + $add_y] : 1;
        $cond2 = isset($this->input[$current_location_x + $left_x][$current_location_y + $left_y]) ? $this->input[$current_location_x + $left_x][$current_location_y + $left_y] : 2;
        $cond3 = isset($this->input[$current_location_x + $add_x][$current_location_y + $add_y]) ? $this->input[$current_location_x + $add_x][$current_location_y + $add_y] : 2;
        //end condition
        $cond_redirect = (isset($this->input[$current_location_x + $add_x][$current_location_y + $add_y]) ) ? $this->input[$current_location_x + $add_x][$current_location_y + $add_y] : 0;
        if ($cond_redirect == 1 || ($current_location_x == 8 && $this->direction == 2) || ($current_location_y == 8 && $this->direction == 1) || ($current_location_x == 1 && $this->direction == 4) || ($current_location_y == 1 && $this->direction == 3)) {
            $this->input[$current_location_x][$current_location_y] = 2;
            switch ($this->direction) {
                case 1:
                    $this->direction = 2;
                    break;
                case 2:
                    $this->direction = 3;
                    break;
                case 3:
                    $this->direction = 4;
                    break;
                case 4:
                    $this->direction = 1;
                    break;
            }
            $arr = $this->go($current_location_x + $left_x, $current_location_y + $left_y);
            $location_tmp = array();
            foreach ($arr as $key => $value) {
                $location_tmp[] = $value;
            }
            return $location_tmp;
        } elseif (($cond1 == 1 && $cond2 == 2 )|| $cond3 == 2) {
            $location_tmp = array();
            $location_tmp[] = array(
                $current_location_x => array(
                    $current_location_y
                )
            );
            $this->input[$current_location_x][$current_location_y] = 5;
            return $location_tmp;
        }
        $location_tmp = array();
        $this->input[$current_location_x][$current_location_y] = 2;
        $arr = $this->go($current_location_x + $add_x, $current_location_y + $add_y);
        foreach ($arr as $key => $value) {
            $location_tmp[] = $value;
        }
        return $location_tmp;
    }

}
