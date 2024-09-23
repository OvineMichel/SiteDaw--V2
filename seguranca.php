<?php
function detectSQL($input) {
        $keywords = ['OR', 'AND', 'IF', 'THEN', 'ELSE', 'WHEN', 'SELECT', 'INSERT', 'UPDATE', 'DELETE', 'DROP', 'EXEC', 'UNION', 'WHERE', 'JOIN'];
        $upperInput = strtoupper($input);
    
        foreach ($keywords as $keyword) {
            if (strpos($upperInput, $keyword) !== false) {
                return true;
            }
        }
        return false;
    }
    
    function senhaCharEsp($password) {
        if(preg_match('/[\/;:\(\)\*]/', $password)){
            return true;
        }
        return false;
    }
    
    function senhaCurto($password) {
        if(strlen($password) < 8){
            return true;
        }
    }
    ?>