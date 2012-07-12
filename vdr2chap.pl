#!/usr/bin/perl

my $nLine = 0;

chap(++$nLine, "00:00:00.000","Intro\n");

my @in = <STDIN>;

foreach my $line (@in){
    
    my @split = split(/ /, $line);
    my $timecode = shift(@split);
    my $text = join(" ", @split);
    chap(++$nLine, $timecode, $text);
}
exit(0);

sub chap {
    my ($line, $timecode, $title) = @_;

    my @time = split(/:/, $timecode);
    
    if(@time[2]) {
        my ($s, $ms) = split (/\./, @time[2]);
        $ms *= 10;
        printf("CHAPTER%02d=%02d:%02d:%02d.%03d\nCHAPTER%02dNAME=%s",$line,$time[0],$time[1],$s,$ms,$line,$title);
    }
}