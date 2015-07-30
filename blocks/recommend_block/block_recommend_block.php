<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Online users block.
 *
 * @package    block_recommend_block
 * @copyright  1999 onwards Martin Dougiamas (http://dougiamas.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * This block needs to be reworked.
 * The new roles system does away with the concepts of rigid student and
 * teacher roles.
 */


class block_recommend_block extends block_base {
    function init() {
        $this->title = get_string('pluginname','block_recommend_block');
    }
    
    function  get_content()
    {
        global $USER, $CFG;
        if ($this->content !== NULL) {
            return $this->content;
        }

        $this->content = new stdClass;
        $this->content->text = '';
        $this->content->footer = '';

        if (empty($this->instance)) {
            return $this->content;
        }
        $this->content->text = '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function()
        {
            showImgQRCode($(location).attr("href"));
        });
        </script>
        <script>
        function showImgQRCode(str) 
        {
            $.ajax
            ({ 
                type: "GET", 
                url:"'.$CFG->wwwroot.'/blocks/recommend_block/ajax_rec_code.php?link=" + str, 
                data: { get_param: "value" }, 
                dataType: "json",
                success: function (data) 
                {     
                    $.each(data, function(index, element) 
                    {        
                        if (index=="imgsrc") 
                        {
                            $(".block_recommend_block #imgsrc").attr("src", element);
                        }else 
                        {
                            $(".block_recommend_block #rec_link").val(element);
                        }
                    });
                }
            });
        }
        </script>
        <div id="txtHint">                                
        <img id="imgsrc"/>
        <input type = "text" id="rec_link"></input>
        </div>';
        return $this->content;
    } 
     /**
     * allow the block to have a configuration page
     *
     * @return boolean
     */
    public function has_config() {
        return false;
    }

    /**
     * allow more than one instance of the block on a page
     *
     * @return boolean
     */
    public function instance_allow_multiple() {
        //allow more than one instance on a page
        return false;
    }

    /**
     * allow instances to have their own configuration
     *
     * @return boolean
     */
    function instance_allow_config() {
        //allow instances to have their own configuration
        return false;
    }

    /**
     * instance specialisations (must have instance allow config true)
     *
     */
    public function specialization() {
    }

    /**
     * locations where block can be displayed
     *
     * @return array
     */
    public function applicable_formats() {
        return array('all'=>true);
    }

    /**
     * post install configurations
     *
     */
    public function after_install() {
    }

    /**
     * post delete configurations
     *
     */
    public function before_delete() {
    }

}


