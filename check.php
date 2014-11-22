function check_port($port) {
    $conn = @fsockopen("imap.gmail.com", $port, $errno, $errstr, 2);
    if ($conn) {
        fclose($conn);
        return true;
    }else
    {
    		return "disable";
    }
}
	
function server_report() {
    $report = array();
    $svcs = array(
                  '995'=>'IMAP-ssl on 995',
                  '110'=>'POP3',
                  '993'=>'IMAP-ssl on 993',
                  '143'=>'IMAP-simple on 143 '
                
                 );
    foreach ($svcs as $port=>$service) {
        $report[$service] = check_port($port);
    }
    return $report;
}

$report = server_report();
print_r($report);
