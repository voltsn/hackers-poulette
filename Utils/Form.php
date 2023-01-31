<?php 
    class Form{
        private $fields;
        private $errors;

        public function __construct($fields) {
            $this->fields = $fields;
            $this->errors = [];
        }

        public function get_fields(){
            return $this->fields;
        }
        
        public function get_errors(){
            return $this->errors;
        }

        public function validate_form(){
            $this->sanitize_fields();
            $this->fields_valid();
            return empty($this->errors) ? TRUE : $this->errors ;
        }

        private function fields_valid(){
            foreach($this->fields as $field => $value) {
                if ($value == ""){
                    $this->errors[$field] = "please fill in this field";
                }else if ($field == "email"){
                    $value = $this->validate_email($value);
                    if (!$value) {
                        $this->errors[$field] = "please enter a valid email address";
                    }
                } else if ($field == "comment") {
                    if (!$this->is_valid_length($value, 2, 1000)){
                        $this->errors[$field] = "You can enter between 2 and 1000 characters";
                    }
                } else {
                    if (!$this->is_valid_length($value, 2, 255)){
                        $this->errors[$field] = "You can enter between 2 and 255 charaters";
                    }
                    
                    if (preg_match("/[0-9]/", $value)) {
                        $this->errors[$field] = "$field can't contain numbers";
                    }
                }
            }
            
            return empty($this->errors) ? TRUE : FALSE;
        }
        
        private function sanitize_fields(){
            foreach($this->fields as $field => $value) {
                if ($field == "email"){
                    $value = $this->sanitize_email($value);
                } else{
                    $value = $this->sanitize_text($value);
                }
            }
        }

        private function sanitize_email($email){
            return filter_var($email, FILTER_SANITIZE_EMAIL);
        }
    
        private function validate_email($email){
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }
    
        private function is_valid_length($input, $min, $max) {
            return strlen($input) >= $min && strlen($input) <= $max;
        }
    
        private function sanitize_text($input){ 
            // Strip whitespace from the beginning and end of a string
            $input = trim($input);
            
            // Remove backslashes
            $input = stripslashes($input);
    
            // Strip HTML and PHP tags 
            $input = strip_tags($input);
    
            return $input;
        }
    }
?>