<?

/**
 * Class NpsCalculator
 * Outputs the nps score given an array of scores
 * Object oriented programming way
 */
class NpsCalculator {

    public $detractors=0;
    public $promoters=0;
    public $npsScore=0;

    public function returnNpsScore($npsArray) {
        $arrLength=count($npsArray);
        for ($i=0; $i<=$arrLength; $i++) {
            // let`s make sure it is numeric
            if (is_numeric($npsArray[$i])) {
                if ($npsArray[$i]<=6 && $npsArray[$i]>=0)
                    $this->detractors++;
                if ($npsArray[$i]>= 9 && $npsArray[$i]<=10)
                    $this->promoters++;
            }
        }
        // if array is empty, then return 0 since div by 0 is not allowed
        if ($arrLength>0)
            $this->npsScore=(($this->promoters - $this->detractors)/$arrLength)*100;
        else
            $this->npsScore='0';

        return round($this->npsScore,1);
    }
}

$npsScore = new NpsCalculator;
$npsArray=array(0,3,4,10,10,4,10,10,10,10);

echo 'NPS Score: '.$npsScore->returnNpsScore($npsArray).'<br />';

?>
