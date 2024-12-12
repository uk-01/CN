# CN
set ns [new Simulator]
set nf [open lab2.nam w]
$ns namtrace-all $nf
set tf [open lab2.tr w]
$ns trace-all $tf

set n0 [$ns node]
set n1 [$ns node]
set n2 [$ns node]
set n3 [$ns node]
set n4 [$ns node]
set n5 [$ns node]
$n4 shape box

$ns duplex-link $n0 $n4 1005Mb 1ms DropTail
$ns duplex-link $n1 $n4 100Mb 1ms DropTail
$ns duplex-link $n2 $n4 500Mb 1ms DropTail
$ns duplex-link $n3 $n4 2000Mb 1ms DropTail
$ns duplex-link $n5 $n4 100Mb 1ms DropTail

set p1 [new Agent/Ping]
$ns attach-agent $n0 $p1
$p1 set packetSize_ 5000
$p1 set interval_ 0.0001

set p2 [new Agent/Ping]
$ns attach-agent $n1 $p2
$p2 set packetSize 5000
$p2 set interval_ 0.0001

set p3 [new Agent/Ping]
$ns attach-agent $n2 $p3

set p4 [new Agent/Ping]
$ns attach-agent $n3 $p4

set p5 [new Agent/Ping]
$ns attach-agent $n5 $p5

$ns queue-limit $n0 $n4 5
$ns queue-limit $n2 $n4 3 
$ns queue-limit $n5 $n4 2 

Agent/Ping instproc recv {from rtt}{
  $self instvar node_
  puts "node [$node_ id] answer is from $from roundtrip time take is $rtt msec"
}
$ns connect $p1 $p5
$ns connect $p3 $p4

proc finish{}{
  global $ns $nf $tf
  $ns flush-trace 
  close $nf
  close $tf
  exec nam lab2.nam &
  exit 0
}
$ns at 0.1 "$p1 send"
$ns at 0.2 "$p1 send"

$ns at 0.1 "$p3 send"
$ns at 0.2 "$p3 send"
$ns run


}

.awk
BEGIN{
  drop=0;
}
{
  if($1=="d")
    {
      drop++;
    }
}
END{
printf("Total no. of %s packets dropped due to congestion=%d\n",$5,drop);
}

#EXECUTION
#ns lab2.tcl
#awk -f lab2.awk lab2.tr
#vi lab2.tr
  printf("Total no. of %s packets dropped due to congestion=%d\n",$5,drop);
}




