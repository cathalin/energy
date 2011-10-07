
<DOCTYPE html> 
<html> 
<head> 
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" /> 
<style type="text/css"> 
  html { height: 100% }
  body { height: 100%; margin: 0; padding: 0 }
  #map_canvas { height: 100% }
</style> 
<link rel="stylesheet" href="https://c94471.ssl.cf3.rackcdn.com/cwd.css" type="text/css"> 
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> 
<script type="text/javascript" src="http://www.heatmapapi.com/Javascript/HeatmapAPIGoogle3.js"></script> 
<script type="text/javascript" src="http://www.heatmapapi.com/Javascript/HeatMapAPI3.aspx?k=a4dd66ff-c6e6-45d7-b646-41dc6c869e90"></script> 
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.js"></script> 
<title>University of Lincoln Energy Usage HeatMap</title> 
<style>
	 #cwd_header
        {
                background: #005823;
        }

        #map
        {
                background: url('wait.png');
        }
</style> 
 
<script type="text/javascript"> 
 
//Create a heatmap
var myHeatmap = new GEOHeatmap();
var flag = false;
var rValD = 0;
var colours;
 
$(function() {
  
  $.getJSON('getComparison.php', function(data) {
      genMap(data);
     });
});
 
function genMap(data)
{

 
// set up Google map
var myLatlng = new google.maps.LatLng(53.228492, -0.548029);
    var myOptions =
    {
     zoom: 16,
     center: myLatlng,
     mapTypeId: google.maps.MapTypeId.SATELLITE
    }
    
    
var map = new google.maps.Map(document.getElementById("map"), myOptions);

//Create array of points for outline of each building
var sciencePoints = [
      new google.maps.LatLng(53.22832498451554,-0.5498333089232443),
      new google.maps.LatLng(53.22836270529562,-0.5498072364892126),
      new google.maps.LatLng(53.22839262008969,-0.5499245697772781),
      new google.maps.LatLng(53.22832888479419,-0.5499680237304239),
      new google.maps.LatLng(53.22835384958135,-0.5500576210272656),
      new google.maps.LatLng(53.22832659376045,-0.550079587263825),
      new google.maps.LatLng(53.22834907747168,-0.5501544235331868),
      new google.maps.LatLng(53.22827878092911,-0.5502051725619461),
      new google.maps.LatLng(53.22825898282125,-0.5501279813062088),
      new google.maps.LatLng(53.22824335584114,-0.5501367902490439),
      new google.maps.LatLng(53.22821712457227,-0.5500576153660341),
      new google.maps.LatLng(53.22818851389988,-0.5500861754953956),
      new google.maps.LatLng(53.22815459025693,-0.5499549800996684),
      new google.maps.LatLng(53.22817280034733,-0.5499332527352807),
      new google.maps.LatLng(53.22811817321576,-0.5497311799354176),
      new google.maps.LatLng(53.22809345952601,-0.5497550799387241),
      new google.maps.LatLng(53.2280661416926,-0.5496529615507284),
      new google.maps.LatLng(53.22809346083292,-0.5496268847562946),
      new google.maps.LatLng(53.22803750116429,-0.5494247515679274),
      new google.maps.LatLng(53.22801275064882,-0.5494442756216811),
      new google.maps.LatLng(53.22798407797697,-0.5493311441672066),
      new google.maps.LatLng(53.22804268929374,-0.5492899241158944),
      new google.maps.LatLng(53.22805312760636,-0.5493226364278736),
      new google.maps.LatLng(53.22807785246178,-0.5493052909217122),
      new google.maps.LatLng(53.22806741755475,-0.5492660127818516),
      new google.maps.LatLng(53.22810646318447,-0.5492377901476519),
      new google.maps.LatLng(53.22811947861828,-0.5492727181502122),
      new google.maps.LatLng(53.2281454928416,-0.5492531635193876),
      new google.maps.LatLng(53.2281337897914,-0.5492204379833765),
      new google.maps.LatLng(53.22818713323197,-0.5491748265672625),
      new google.maps.LatLng(53.22821703119065,-0.549287930133755),
      new google.maps.LatLng(53.22818581399603,-0.549309657542717),
      new google.maps.LatLng(53.22832498451554,-0.5498333089232443)];

var mainPoints = [
      new google.maps.LatLng(53.2285150736142,-0.5485381346101759),
      new google.maps.LatLng(53.22842450827133,-0.5482220594232723),
      new google.maps.LatLng(53.22841205254449,-0.5482298619861881),
      new google.maps.LatLng(53.2283902553766,-0.5481388305934043),
      new google.maps.LatLng(53.22840135200401,-0.5481274438132655),
      new google.maps.LatLng(53.22830150885253,-0.5477799077024459),
      new google.maps.LatLng(53.22829216707698,-0.547782508646526),
      new google.maps.LatLng(53.2282719264734,-0.5477070829537445),
      new google.maps.LatLng(53.22828282518282,-0.5476940785049367),
      new google.maps.LatLng(53.22819252025989,-0.5473611657951871),
      new google.maps.LatLng(53.22850379973301,-0.5471210152620876),
      new google.maps.LatLng(53.22859421740255,-0.547465198224778),
      new google.maps.LatLng(53.2286035591792,-0.54745219368877),
      new google.maps.LatLng(53.22861757188598,-0.5474808034630096),
      new google.maps.LatLng(53.22863314141575,-0.5474625969686675),
      new google.maps.LatLng(53.2286518251745,-0.5475276195600087),
      new google.maps.LatLng(53.22863158478658,-0.5475458259555199),
      new google.maps.LatLng(53.22872811664202,-0.5478917466521072),
      new google.maps.LatLng(53.22873745852377,-0.5479125539596141),
      new google.maps.LatLng(53.22875458491747,-0.5478969485404672),
      new google.maps.LatLng(53.2287716917394,-0.5479619809224867),
      new google.maps.LatLng(53.22874988740801,-0.5479827894640465),
      new google.maps.LatLng(53.22875764605857,-0.5480009980927714),
      new google.maps.LatLng(53.22874363968965,-0.5480139973244125),
      new google.maps.LatLng(53.22882101914848,-0.5483123769301657)];

var mhtPoints = [
      new google.maps.LatLng(53.22865930107236,-0.5490275554242918),
      new google.maps.LatLng(53.22879729890064,-0.5489317598606902),
      new google.maps.LatLng(53.22879079579521,-0.5488860695515341),
      new google.maps.LatLng(53.22884023963734,-0.548853305622794),
      new google.maps.LatLng(53.22882332046706,-0.5487771560903743),
      new google.maps.LatLng(53.22892882067912,-0.5486918602848356),
      new google.maps.LatLng(53.22924017679787,-0.54979124986274),
      new google.maps.LatLng(53.22912165419996,-0.5498956805924837),
      new google.maps.LatLng(53.22913728281081,-0.5499391960286582),
      new google.maps.LatLng(53.22909299964128,-0.5499805331112451),
      new google.maps.LatLng(53.22907476625213,-0.5499348419980921),
      new google.maps.LatLng(53.22893278619853,-0.5500329662216086)];



var studentsPoints = [
      new google.maps.LatLng(53.22691774149263,-0.5446935524869079),
      new google.maps.LatLng(53.22722787969091,-0.5444521602859698),
      new google.maps.LatLng(53.22731618829415,-0.544754502391801),
      new google.maps.LatLng(53.2272973774167,-0.5447766976673885),
      new google.maps.LatLng(53.22738165533428,-0.545062370237358),
      new google.maps.LatLng(53.22734390508464,-0.5450958685369622),
      new google.maps.LatLng(53.227485148802,-0.5456197815241359),
      new google.maps.LatLng(53.22725504723816,-0.5457942972096785),
      new google.maps.LatLng(53.22703426340945,-0.5449787537864847),
      new google.maps.LatLng(53.22700644844966,-0.5449973312325362)];

var libraryPoints = [
      new google.maps.LatLng(53.22647288309888,-0.5450762696230504),
      new google.maps.LatLng(53.22651480946075,-0.5450375497812177),
      new google.maps.LatLng(53.22649618192465,-0.5449543097102716),
      new google.maps.LatLng(53.22650720653234,-0.5449450767455388),
      new google.maps.LatLng(53.22649075688999,-0.5448989342283117),
      new google.maps.LatLng(53.22653153955678,-0.5448656493670545),
      new google.maps.LatLng(53.22654362877716,-0.5449099566879967),
      new google.maps.LatLng(53.22669653907322,-0.5447985574492831),
      new google.maps.LatLng(53.22672995283955,-0.5448986762019614),
      new google.maps.LatLng(53.22678103720558,-0.5448634171137123),
      new google.maps.LatLng(53.22692867840348,-0.5454479261620149),
      new google.maps.LatLng(53.22681496466044,-0.5455522221801268),
      new google.maps.LatLng(53.22684952821935,-0.5456769944475448),
      new google.maps.LatLng(53.22677817852144,-0.5457459037983903),
      new google.maps.LatLng(53.22671685556816,-0.5454963594634044),
      new google.maps.LatLng(53.22666221104552,-0.545536892963131),
      new google.maps.LatLng(53.22663436035729,-0.5454454331797942),
      new google.maps.LatLng(53.22658764340716,-0.5454747040221841),
      new google.maps.LatLng(53.22655987378029,-0.5453852685172123),
      new google.maps.LatLng(53.22660209151176,-0.5453484607971804),
      new google.maps.LatLng(53.22658431602683,-0.545292508483568),
      new google.maps.LatLng(53.22654436010539,-0.545325620913526),
      new google.maps.LatLng(53.2265190098304,-0.5452230343672582),
      new google.maps.LatLng(53.22654779892717,-0.5451935285172649),
      new google.maps.LatLng(53.22653456934172,-0.54514514776552),
      new google.maps.LatLng(53.22649699586798,-0.5451653193243033),
      new google.maps.LatLng(53.22647288309888,-0.5450762696230504)];

var bridgeHousePoints = [
      new google.maps.LatLng(53.22947128055943,-0.5507760057515032),
      new google.maps.LatLng(53.22945576792774,-0.5505783328849179),
      new google.maps.LatLng(53.22961761307289,-0.5505471699904729),
      new google.maps.LatLng(53.22960824552078,-0.5504275932645919),
      new google.maps.LatLng(53.22968609719018,-0.550409359569568),
      new google.maps.LatLng(53.22968133060083,-0.5503081043988101),
      new google.maps.LatLng(53.22980283379028,-0.5502897602081636),
      new google.maps.LatLng(53.22982706802144,-0.5507027501163153),
      new google.maps.LatLng(53.22947128055943,-0.5507760057515032)];

var architecturePoints = [
      new google.maps.LatLng(53.22790924678402,-0.5490236745272681),
      new google.maps.LatLng(53.22764497936578,-0.5480233233551202),
      new google.maps.LatLng(53.22771610699279,-0.5478918036736447),
      new google.maps.LatLng(53.22768851854337,-0.5477569076309186),
      new google.maps.LatLng(53.22777661665814,-0.5476528843960327),
      new google.maps.LatLng(53.22807128862934,-0.5487461973668295),
      new google.maps.LatLng(53.22804060909144,-0.5487795802330508),
      new google.maps.LatLng(53.22805284896146,-0.5488267502483646),
      new google.maps.LatLng(53.22799272752033,-0.5488726898896656),
      new google.maps.LatLng(53.22801219293473,-0.5489463858531873),
      new google.maps.LatLng(53.22790924678402,-0.5490236745272681)];

var sportsPoints = [
      new google.maps.LatLng(53.22933285534344,-0.5536007853809299),
      new google.maps.LatLng(53.22907460940247,-0.5538530773383155),
      new google.maps.LatLng(53.22913842242728,-0.5540597096065913),
      new google.maps.LatLng(53.22902194434285,-0.5541640965779882),
      new google.maps.LatLng(53.22863116861221,-0.5529844348681423),
      new google.maps.LatLng(53.22869608827129,-0.5529246870060045),
      new google.maps.LatLng(53.22868284147698,-0.5528826356975092),
      new google.maps.LatLng(53.22871198895066,-0.5528560811577421),
      new google.maps.LatLng(53.22870139140485,-0.5528250958546588),
      new google.maps.LatLng(53.22897818851341,-0.5525653292879817)];

var villagePoints = [
      new google.maps.LatLng(53.22952490891208,-0.5525383446001475),
      new google.maps.LatLng(53.22948935156153,-0.5519796177927772),
      new google.maps.LatLng(53.2294234195121,-0.5519875898334448),
      new google.maps.LatLng(53.22941932684258,-0.551924615505972),
      new google.maps.LatLng(53.22944151717584,-0.5519225669295136),
      new google.maps.LatLng(53.22943503252345,-0.5518305764241704),
      new google.maps.LatLng(53.22947861504707,-0.5518220986267963),
      new google.maps.LatLng(53.22948542393712,-0.5519131644049047),
      new google.maps.LatLng(53.22954381884585,-0.5519051229426386),
      new google.maps.LatLng(53.22958555311629,-0.5525272373209611)];

var sparkhousePoints = [
      new google.maps.LatLng(53.22647489489696,-0.5457221626699571),
      new google.maps.LatLng(53.22639012972704,-0.5457459959037936),
      new google.maps.LatLng(53.22626303354513,-0.5453894663990444),
      new google.maps.LatLng(53.22624071377602,-0.5453880531948208),
      new google.maps.LatLng(53.22622658206731,-0.5453482060642856),
      new google.maps.LatLng(53.22626518443479,-0.5452974030318447),
      new google.maps.LatLng(53.22626240135047,-0.5452670123231751),
      new google.maps.LatLng(53.2262934787694,-0.5452196308773383),
      new google.maps.LatLng(53.22647489489696,-0.5457221626699571)];

var court1Points = [
      new google.maps.LatLng(53.23074253872466,-0.5561583272215087),
      new google.maps.LatLng(53.23071826382269,-0.556007192648732),
      new google.maps.LatLng(53.23055291186811,-0.5560847903822408),
      new google.maps.LatLng(53.23053371879505,-0.5559694192328868),
      new google.maps.LatLng(53.23057652430981,-0.5559508109012912),
      new google.maps.LatLng(53.23056440084287,-0.5558776877136362),
      new google.maps.LatLng(53.23080851833955,-0.5557597232605604),
      new google.maps.LatLng(53.23082478277404,-0.5558800129060648),
      new google.maps.LatLng(53.23078980084751,-0.5558968835106581),
      new google.maps.LatLng(53.23079702962006,-0.5559668269809337),
      new google.maps.LatLng(53.23083291296524,-0.5559466155724069),
      new google.maps.LatLng(53.23085510262763,-0.5561055264163206)];

var court2Points = [
      new google.maps.LatLng(53.2307828541462,-0.5556428142508274),
      new google.maps.LatLng(53.23076397641693,-0.5556507233593255),
      new google.maps.LatLng(53.23077070263189,-0.5556868921739988),
      new google.maps.LatLng(53.23070201809186,-0.555718762701426),
      new google.maps.LatLng(53.2306979623261,-0.5556898092936946),
      new google.maps.LatLng(53.23068935621087,-0.5556932287594851),
      new google.maps.LatLng(53.23066638973809,-0.5555467122012892),
      new google.maps.LatLng(53.23039193045329,-0.5556656608665866),
      new google.maps.LatLng(53.23037346824475,-0.555556894546726),
      new google.maps.LatLng(53.2304108337864,-0.5555450561599751),
      new google.maps.LatLng(53.23039677058568,-0.555469395431113),
      new google.maps.LatLng(53.23073946727384,-0.5553055530980522),
      new google.maps.LatLng(53.23075767215244,-0.5554125235125684),
      new google.maps.LatLng(53.23071147241933,-0.5554307838055661),
      new google.maps.LatLng(53.2307200454375,-0.5555299932036128),
      new google.maps.LatLng(53.23076327609043,-0.5555132218853387)];

var court3Points = [
      new google.maps.LatLng(53.23070277911383,-0.5552325791433732),
new google.maps.LatLng(53.23063511244013,-0.5552668737393163),
new google.maps.LatLng(53.23063084409105,-0.5552382180170612),
new google.maps.LatLng(53.23061308883968,-0.5552455927514843),
new google.maps.LatLng(53.23058837368973,-0.5550950096956397),
new google.maps.LatLng(53.23031513211195,-0.555206624152117),
new google.maps.LatLng(53.23030179443101,-0.5550986708627692),
new google.maps.LatLng(53.23033679670074,-0.5550804729833259),
new google.maps.LatLng(53.23032734498135,-0.5550175968993865),
new google.maps.LatLng(53.23066843082344,-0.5548593437914284),
new google.maps.LatLng(53.23068542681876,-0.5549793054740959),
new google.maps.LatLng(53.23064113785819,-0.5549953507837269),
new google.maps.LatLng(53.23065076495485,-0.5550580213631728),
new google.maps.LatLng(53.23067096122048,-0.5550504583947513),
new google.maps.LatLng(53.23067506067723,-0.5550736076364549),
new google.maps.LatLng(53.23069075001584,-0.5550673825027663),
new google.maps.LatLng(53.23071248083991,-0.5551937199422263),
new google.maps.LatLng(53.23069696015587,-0.5552007242107915)];

var court4Points = [
  new google.maps.LatLng(53.23064027101616,-0.5547468996109117),
new google.maps.LatLng(53.23062710991567,-0.5547522619194789),
new google.maps.LatLng(53.2306307839058,-0.5547769751787679),
new google.maps.LatLng(53.2305636450014,-0.5548118656799461),
new google.maps.LatLng(53.23055824617088,-0.5547830485676497),
new google.maps.LatLng(53.23054061149691,-0.5547886217655429),
new google.maps.LatLng(53.23051554167294,-0.5546409288753651),
new google.maps.LatLng(53.23024653218,-0.5547600415293752),
new google.maps.LatLng(53.23022753362989,-0.5546435083406365),
new google.maps.LatLng(53.23026494095529,-0.5546279935979359),
new google.maps.LatLng(53.2302541267339,-0.5545671620579806),
new google.maps.LatLng(53.23059882383426,-0.55441193057847),
new google.maps.LatLng(53.23061608978275,-0.5545163416089016),
new google.maps.LatLng(53.23056771876531,-0.5545376731444496),
new google.maps.LatLng(53.23057975909055,-0.5546229605783648),
new google.maps.LatLng(53.23061824228989,-0.5546033518940185)];

var court5Points = [
  new google.maps.LatLng(53.23056727232171,-0.5542934025854995),
new google.maps.LatLng(53.23055328640285,-0.5542987700426383),
new google.maps.LatLng(53.23055808832189,-0.5543294397667686),
new google.maps.LatLng(53.23048441647798,-0.5543589849622388),
new google.maps.LatLng(53.23048133879206,-0.554339236045257),
new google.maps.LatLng(53.23047366882137,-0.5543413238709094),
new google.maps.LatLng(53.23045087255997,-0.5541955374620644),
new google.maps.LatLng(53.2302686075087,-0.5542745023838558),
new google.maps.LatLng(53.23024779865046,-0.5541481702894602),
new google.maps.LatLng(53.23028556361545,-0.5541339169189363),
new google.maps.LatLng(53.23027327815052,-0.5540565127660591),
new google.maps.LatLng(53.23052747294368,-0.5539580944230338),
new google.maps.LatLng(53.2305430577417,-0.5540647465568982),
new google.maps.LatLng(53.23049927234481,-0.5540823438890397),
new google.maps.LatLng(53.23050954214948,-0.5541593460461502),
new google.maps.LatLng(53.23054312761632,-0.5541444706555709)];

var court6Points = [
  new google.maps.LatLng(53.23016580081484,-0.5533707917688047),
new google.maps.LatLng(53.23015948218777,-0.553293116508411),
new google.maps.LatLng(53.23017470227597,-0.5532891234427928),
new google.maps.LatLng(53.23017176056448,-0.5532115010734306),
new google.maps.LatLng(53.23040837764709,-0.5531743020585722),
new google.maps.LatLng(53.23041679372331,-0.5533295874986788)];

var court7Points = [
  new google.maps.LatLng(53.23014118559404,-0.5529428330477937),
new google.maps.LatLng(53.2301365631094,-0.5528637739725573),
new google.maps.LatLng(53.23015009467408,-0.5528597543279501),
new google.maps.LatLng(53.23014630845485,-0.5527821188001136),
new google.maps.LatLng(53.23038029454477,-0.5527473366850155),
new google.maps.LatLng(53.23038798088809,-0.5528973290856753)];

var court8Points = [
  new google.maps.LatLng(53.23010812851251,-0.5525091631182166),
new google.maps.LatLng(53.23010348241561,-0.552432858497155),
new google.maps.LatLng(53.23011873981577,-0.5524261473535341),
new google.maps.LatLng(53.23011576242678,-0.5523541230592555),
new google.maps.LatLng(53.23034820586359,-0.5523113547439862),
new google.maps.LatLng(53.23035746732261,-0.5524666533110023)];

var court9Points = [
  new google.maps.LatLng(53.23008585832057,-0.5520733804046218),
new google.maps.LatLng(53.23007905299513,-0.5520033831221116),
new google.maps.LatLng(53.23009539184039,-0.5519957110135831),
new google.maps.LatLng(53.23009032520542,-0.5519208590064206),
new google.maps.LatLng(53.23032255086075,-0.5518829486285037),
new google.maps.LatLng(53.23033223792795,-0.5520332804766537)];

var court10Points = [
  new google.maps.LatLng(53.23004817670598,-0.551553436720994),
new google.maps.LatLng(53.2300440427956,-0.5514801289662774),
new google.maps.LatLng(53.23005916156335,-0.5514759210227438),
new google.maps.LatLng(53.23005513854485,-0.5513989143206288),
new google.maps.LatLng(53.23028726703669,-0.5513616158712198),
new google.maps.LatLng(53.23029760482548,-0.5515126343166687)];

var court11Points = [
  new google.maps.LatLng(53.23002066584246,-0.5511246524706481),
new google.maps.LatLng(53.23001772841018,-0.5510504848077169),
new google.maps.LatLng(53.23003206925845,-0.5510445775928696),
new google.maps.LatLng(53.23002721344559,-0.5509669593079702),
new google.maps.LatLng(53.23025920596607,-0.5509308808944335),
new google.maps.LatLng(53.23026684436763,-0.5510842820460149)];

var court12Points = [
  new google.maps.LatLng(53.22999594194559,-0.5506205681012322),
new google.maps.LatLng(53.22996729271231,-0.550481772711171),
new google.maps.LatLng(53.23014630986437,-0.5503940262663209),
new google.maps.LatLng(53.23015974555415,-0.5504489387860023),
new google.maps.LatLng(53.23017051750883,-0.5504428485044632),
new google.maps.LatLng(53.23018512834807,-0.5505298926467372)];

var court13Points = [
  new google.maps.LatLng(53.22991171215754,-0.5510711932109491),
new google.maps.LatLng(53.22992115962025,-0.5511939308401992),
new google.maps.LatLng(53.22990580724186,-0.5511959672760092),
new google.maps.LatLng(53.22990698858411,-0.5512573527585363),
new google.maps.LatLng(53.22982895407608,-0.5512695954324709),
new google.maps.LatLng(53.22982421948256,-0.5512200567356063),
new google.maps.LatLng(53.22981001283046,-0.5512220961528913),
new google.maps.LatLng(53.22979698496906,-0.5510793639985856),
new google.maps.LatLng(53.22974245964358,-0.5510894054408833),
new google.maps.LatLng(53.22974364591867,-0.5511032939304217),
new google.maps.LatLng(53.22969854695658,-0.551111348542519),
new google.maps.LatLng(53.22969735938535,-0.5510974520305678),
new google.maps.LatLng(53.22950450104426,-0.5511377279981688),
new google.maps.LatLng(53.22950092047916,-0.5510999159452201),
new google.maps.LatLng(53.22947465361442,-0.5511019711973086),
new google.maps.LatLng(53.22946629171669,-0.550970550114902),
new google.maps.LatLng(53.22949137036768,-0.5509645578579914),
new google.maps.LatLng(53.22949017635879,-0.5509287219310355),
new google.maps.LatLng(53.22954863222597,-0.5509127921529289),
new google.maps.LatLng(53.22954863208319,-0.5508889188533217),
new google.maps.LatLng(53.22960581006942,-0.5508789941449965),
new google.maps.LatLng(53.2296070005258,-0.5508988741404364),
new google.maps.LatLng(53.22967478860865,-0.5508889523807425),
new google.maps.LatLng(53.22967360024745,-0.5508730619709146),
new google.maps.LatLng(53.22971754119121,-0.5508651420833288),
new google.maps.LatLng(53.22971991500125,-0.5508810240896489),
new google.maps.LatLng(53.22989399195164,-0.5508493976806972),
new google.maps.LatLng(53.22990108128084,-0.5509682310832353),
new google.maps.LatLng(53.22988808452219,-0.5509722024828245),
new google.maps.LatLng(53.22989635604267,-0.5510692445580301)];

var court14Points = [
  new google.maps.LatLng(53.22995437055248,-0.5516743780658828),
new google.maps.LatLng(53.22994028027573,-0.5516746200202693),
new google.maps.LatLng(53.22994209271047,-0.5517287832399786),
new google.maps.LatLng(53.22986138090207,-0.5517414227985384),
new google.maps.LatLng(53.22985628820777,-0.5516939640572216),
new google.maps.LatLng(53.22984120057216,-0.5516937834182079),
new google.maps.LatLng(53.22982857039798,-0.5515446112055655),
new google.maps.LatLng(53.22976607532204,-0.5515560299711886),
new google.maps.LatLng(53.22976835472257,-0.5515783629205184),
new google.maps.LatLng(53.2297186575498,-0.5515874888954142),
new google.maps.LatLng(53.22971549854975,-0.5515641337730282),
new google.maps.LatLng(53.22953227049386,-0.5515934917512766),
new google.maps.LatLng(53.22952977937391,-0.5515697597452562),
new google.maps.LatLng(53.22950508596142,-0.5515694099603752),
new google.maps.LatLng(53.2294923855094,-0.5514350508698218),
new google.maps.LatLng(53.22951661825014,-0.551429239424327),
new google.maps.LatLng(53.22951655888216,-0.5514033078765279),
new google.maps.LatLng(53.22958519425368,-0.5513839069308279),
new google.maps.LatLng(53.22958430540023,-0.5513654601286622),
new google.maps.LatLng(53.22963676146708,-0.551355219576356),
new google.maps.LatLng(53.2296376783509,-0.5513757201230662),
new google.maps.LatLng(53.22970641593668,-0.5513617553295347),
new google.maps.LatLng(53.22970443294305,-0.551348135166897),
new google.maps.LatLng(53.22974599216937,-0.551339344285644),
new google.maps.LatLng(53.2297470295005,-0.551354892222452),
new google.maps.LatLng(53.22992100001739,-0.5513263057259021),
new google.maps.LatLng(53.22992788890891,-0.5514425146325797),
new google.maps.LatLng(53.2299179205818,-0.5514442986387624),
new google.maps.LatLng(53.22992760535724,-0.5515422185278396),
new google.maps.LatLng(53.22994151251107,-0.5515428019080937)];

var court15Points = [
  new google.maps.LatLng(53.22998292898306,-0.5521473553399492),
new google.maps.LatLng(53.22996924196508,-0.5521505829294548),
new google.maps.LatLng(53.22997313831829,-0.5522011021526896),
new google.maps.LatLng(53.2298895955479,-0.5522167428609981),
new google.maps.LatLng(53.22988498636977,-0.5521660489623492),
new google.maps.LatLng(53.22987032600227,-0.5521660633720327),
new google.maps.LatLng(53.2298547109583,-0.5520239710879438),
new google.maps.LatLng(53.22980073258599,-0.5520296725012352),
new google.maps.LatLng(53.22980168197918,-0.5520492808233013),
new google.maps.LatLng(53.22974706158425,-0.5520556495704809),
new google.maps.LatLng(53.22974449260867,-0.5520363091662028),
new google.maps.LatLng(53.22967835980253,-0.5520459996061433),
new google.maps.LatLng(53.22967272081087,-0.552005618999325),
new google.maps.LatLng(53.2296144188208,-0.5520146803469472),
new google.maps.LatLng(53.22960603655843,-0.5519128852050714),
new google.maps.LatLng(53.2296670129682,-0.5518990945022817),
new google.maps.LatLng(53.22966300775033,-0.5518540947033346),
new google.maps.LatLng(53.22995284641117,-0.5517961990765619),
new google.maps.LatLng(53.22996236316349,-0.5519160648057142),
new google.maps.LatLng(53.22995081318622,-0.5519173820461809),
new google.maps.LatLng(53.22996211123106,-0.5520160344072211),
new google.maps.LatLng(53.22997377709312,-0.5520165618035078)
];

var court16Points = [
  new google.maps.LatLng(53.22963984925909,-0.552392589132622),
new google.maps.LatLng(53.22970194312455,-0.5523768995980805),
new google.maps.LatLng(53.22969793674044,-0.5523277888071965),
new google.maps.LatLng(53.22998880205395,-0.5522704187555871),
new google.maps.LatLng(53.23001624893502,-0.5526235931124068),
new google.maps.LatLng(53.2300008482685,-0.552624710931704),
new google.maps.LatLng(53.23000419526547,-0.5526750080659315),
new google.maps.LatLng(53.22992253582587,-0.5526962198198548),
new google.maps.LatLng(53.22991852201871,-0.5526470572223219),
new google.maps.LatLng(53.2298997891631,-0.552651524328347),
new google.maps.LatLng(53.22988775069302,-0.5524873008187159),
new google.maps.LatLng(53.22982890150226,-0.5524985043275765),
new google.maps.LatLng(53.22982890118986,-0.5525197249750657),
new google.maps.LatLng(53.22977810058676,-0.5525275643904926),
new google.maps.LatLng(53.22977542784979,-0.5525029998162079),
new google.maps.LatLng(53.22971195939616,-0.5525141961535751),
new google.maps.LatLng(53.22970862052742,-0.5524740108212733),
new google.maps.LatLng(53.22964986092828,-0.5524818609394788)];

var court17Points = [
  new google.maps.LatLng(53.23005022925186,-0.5534131489162042),
new google.maps.LatLng(53.2300527488955,-0.5534644481272732),
new google.maps.LatLng(53.22996887264302,-0.553485211290512),
new google.maps.LatLng(53.22996318446518,-0.5534306671994982),
new google.maps.LatLng(53.22995070967254,-0.553433763207668),
new google.maps.LatLng(53.22993843084655,-0.5532755778394338),
new google.maps.LatLng(53.22987825760391,-0.5532846634907751),
new google.maps.LatLng(53.22987959276384,-0.5533064048854597),
new google.maps.LatLng(53.22982634695159,-0.5533142956912984),
new google.maps.LatLng(53.22982365834105,-0.5532947287640899),
new google.maps.LatLng(53.22975941200879,-0.5533058364701349),
new google.maps.LatLng(53.22975786688095,-0.5532503915804954),
new google.maps.LatLng(53.22969828122628,-0.5532674124934545),
new google.maps.LatLng(53.22969220637246,-0.5531713708773645),
new google.maps.LatLng(53.22975415724094,-0.5531587996313103),
new google.maps.LatLng(53.22975212534607,-0.5531185156023477),
new google.maps.LatLng(53.23004357595848,-0.5530637134498417),
new google.maps.LatLng(53.23006676141998,-0.5534104059344824)];

var lpacPoints = [
  new google.maps.LatLng(53.22756378949665,-0.5461778087161406),
  new google.maps.LatLng(53.22752163315707,-0.5462020179254778),
  new google.maps.LatLng(53.22752822111722,-0.5462504318733585),
  new google.maps.LatLng(53.22738330954136,-0.5463604709125591),
  new google.maps.LatLng(53.22737540436937,-0.5463120570946045),
  new google.maps.LatLng(53.22725157113793,-0.5464154929335185),
  new google.maps.LatLng(53.22712641022237,-0.5459445638720617),
  new google.maps.LatLng(53.22743215376471,-0.5457046748535921),
  new google.maps.LatLng(53.22756378949665,-0.5461778087161406)
];

var emtecPoints = [
    new google.maps.LatLng(53.22932223306122,-0.5495018790256478),
    new google.maps.LatLng(53.2292258525461,-0.5495714997245338),
    new google.maps.LatLng(53.22907108211444,-0.5489923552426923),
    new google.maps.LatLng(53.22916783932655,-0.5489202121765513)];

//Now create polygon using previous points and fill
  var scienceBuilding = new google.maps.Polygon({
    paths: sciencePoints,
    strokeColor: data[8],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[8],
    fillOpacity: 0.35
  });

var sparkhouseBuilding = new google.maps.Polygon({
	paths: sparkhousePoints,
	strokeColor: data[10],
	strokeOpacity: 0.8,
	strokeWeight: 2,
	fillColor: data[10],
	fillOpacity: 0.35
});

  
  var mainBuilding = new google.maps.Polygon({
    paths: mainPoints,
    strokeColor: data[6],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[6],
    fillOpacity: 0.35
  });
  
  var mhtBuilding = new google.maps.Polygon({
    paths: mhtPoints,
    strokeColor: data[7],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[7],
    fillOpacity: 0.35
  });
  
  
  var studentsBuilding = new google.maps.Polygon({
    paths: studentsPoints,
    strokeColor: data[12],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[12],
    fillOpacity: 0.35
  });
  
  var libraryBuilding = new google.maps.Polygon({
    paths: libraryPoints,
    strokeColor: data[4],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[4],
    fillOpacity: 0.35
  });
  
  var bridgeHouseBuilding = new google.maps.Polygon({
    paths: bridgeHousePoints,
    strokeColor: data[1],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[1],
    fillOpacity: 0.35
  });
  
  var architectureBuilding = new google.maps.Polygon({
    paths: architecturePoints,
    strokeColor: data[0],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[0],
    fillOpacity: 0.35
  });

  var sportsBuilding = new google.maps.Polygon({
    paths: sportsPoints,
    strokeColor: data[11],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[11],
    fillOpacity: 0.35
  });
  
  var villageBuilding = new google.maps.Polygon({
    paths: villagePoints,
    strokeColor: data[13],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[13],
    fillOpacity: 0.35
  });
  
   var court1Building = new google.maps.Polygon({
    paths: court1Points,
    strokeColor: data[15],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[15],
    fillOpacity: 0.35
  });

var court2Building = new google.maps.Polygon({
    paths: court2Points,
    strokeColor: data[16],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[16],
    fillOpacity: 0.35
  });

var court3Building = new google.maps.Polygon({
    paths: court3Points,
    strokeColor: data[17],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[17],
    fillOpacity: 0.35
  });

var court4Building = new google.maps.Polygon({
    paths: court4Points,
    strokeColor: data[18],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[18],
    fillOpacity: 0.35
  });

var court5Building = new google.maps.Polygon({
    paths: court5Points,
    strokeColor: data[19],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[19],
    fillOpacity: 0.35
  });

var court6Building = new google.maps.Polygon({
    paths: court6Points,
    strokeColor: data[20],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[20],
    fillOpacity: 0.35
  });

var court7Building = new google.maps.Polygon({
    paths: court7Points,
    strokeColor: data[21],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[21],
    fillOpacity: 0.35
  });

var court8Building = new google.maps.Polygon({
    paths: court8Points,
    strokeColor: data[22],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[22],
    fillOpacity: 0.35
  });

var court9Building = new google.maps.Polygon({
    paths: court9Points,
    strokeColor: data[23],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[23],
    fillOpacity: 0.35
  });

var court10Building = new google.maps.Polygon({
    paths: court10Points,
    strokeColor: data[24],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[24],
    fillOpacity: 0.35
  });
var court11Building = new google.maps.Polygon({
    paths: court11Points,
    strokeColor: data[25],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[25],
    fillOpacity: 0.35
  });

var court12Building = new google.maps.Polygon({
    paths: court12Points,
    strokeColor: data[26],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[26],
    fillOpacity: 0.35
  });

var court13Building = new google.maps.Polygon({
    paths: court13Points,
    strokeColor: data[27],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[27],
    fillOpacity: 0.35
  });

var court14Building = new google.maps.Polygon({
    paths: court14Points,
    strokeColor: data[28],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[28],
    fillOpacity: 0.35
  });

var court15Building = new google.maps.Polygon({
    paths: court15Points,
    strokeColor: data[29],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[29],
    fillOpacity: 0.35
  });

var court16Building = new google.maps.Polygon({
    paths: court16Points,
    strokeColor: data[30],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[30],
    fillOpacity: 0.35
  });

var court17Building = new google.maps.Polygon({
    paths: court17Points,
    strokeColor: data[31],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[31],
    fillOpacity: 0.35
  });

var lpacBuilding = new google.maps.Polygon({
    paths: lpacPoints,
    strokeColor: data[32],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[32],
    fillOpacity: 0.35
  });

var emtecBuilding = new google.maps.Polygon({
    paths: emtecPoints,
    strokeColor: data[3],
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: data[3],
    fillOpacity: 0.35
  });
  
//Add buildings to map
  scienceBuilding.setMap(map);
  mainBuilding.setMap(map);
  mhtBuilding.setMap(map);
  studentsBuilding.setMap(map);
  libraryBuilding.setMap(map);
  bridgeHouseBuilding.setMap(map);
  architectureBuilding.setMap(map);
  sportsBuilding.setMap(map);
  villageBuilding.setMap(map);
  court1Building.setMap(map);
  court2Building.setMap(map);
  court3Building.setMap(map);
  court4Building.setMap(map);
  court5Building.setMap(map);
  court6Building.setMap(map);
  court7Building.setMap(map);
  court8Building.setMap(map);
  court9Building.setMap(map);
  court10Building.setMap(map);
  court11Building.setMap(map);
  court12Building.setMap(map);
  court13Building.setMap(map);
  court14Building.setMap(map);
  court15Building.setMap(map);
  court16Building.setMap(map);
  court17Building.setMap(map);
  lpacBuilding.setMap(map);
  emtecBuilding.setMap(map);
  sparkhouseBuilding.setMap(map);  
}
</script> 
</head> 
<body onload="initialize()"> 
	<header id="cwd_header" role="banner"> 
	
		<section class="cwd_container"> 
	
			<hgroup class="grid_12" id="cwd_hgroup"> 
						
				<a href="/"> 
					<h1>Energy Data Visualisation</h1> 
					<h2></h2> 
				</a> 
							
			</hgroup> 
 
		</section> 
			
	</header> 
 
        <nav class="cwd_container" role="navigation"> 
		<ul id="cwd_navigation" class="grid_12">  
			<li><a href="index.php">Campus Heat Map</a></li>
	        	<li class="current"><a href="comparison.php">Energy Usage Comparison</a></li>
			<li><a href="courts.php">Student Courts Leaderboard</a</li>
			<li><a href="documentation.php">Documentation</a></li> 
    		</ul>  
	</nav> 
 
	<section class="cwd_container" id="cwd_content" role="main"> 
          <p style ="margin: 20px">The map below shows a comparison of energy usage over 2 consecutive periods of 24 hours. Where a building has used less energy in the most recent 24 hour period, the 
	building is highlighted in green. Where more energy is being used, the building is highlighted in red and where some data is missing, the building is highlighted in blue.</p> 
          <div id="map" class="grid_12" style="height:500px" ></div> 
        </section> 
</body> 
</html> 
 
