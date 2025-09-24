<?php
$conn = new mysqli("localhost","root", "123", "wlc");
function getConn() {
    return $conn; 
}