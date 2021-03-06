<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../../vendor/autoload.php');
use App\Teachers\Teachers;
use App\Teachers\Auth;
use App\Message\Message;
use App\Utility\Utility;

$obj= new Teachers();
$obj->setData($_SESSION);
$singleUser = $obj->view();

$auth= new Auth();
$status = $auth->setData($_SESSION)->logged_in();

if(!$status) {
    Utility::redirect('signup.php');
    return;
}
?>

<!DOCTYPE html>
<html>
<head>


    <link rel="stylesheet" href="../../../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../../resources/bootstrap-3.3.7-dist/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../../../resources/bootstrap-3.3.7-dist/css/style.css">

    <script src="../../../../../resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
    <script src="../../../../../resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

    <title></title>

    <script type="text/javascript" src="https://api.bistri.com/bistri.conference.min.js"></script>

    <script type="text/javascript">
        /*
    JS library reference:
    http://developers.bistri.com/webrtc-sdk/js-library-reference
*/

        var room;
        var members;
        var localStream;

        // when Bistri API client is ready, function
        // "onBistriConferenceReady" is invoked

        onBistriConferenceReady = function () {

            // test if the browser is WebRTC compatible
            if ( !bc.isCompatible() ) {
                // if the browser is not compatible, display an alert
                alert( "your browser is not WebRTC compatible !" );
                // then stop the script execution
                return;
            }

            // initialize API client with application keys

            bc.init( {
                "appId": "4ffa4178",
                "appKey": "e8da695a3911b823e48fcff91415438d"
            } );


            // when local user is connected to the server
            bc.signaling.bind( "onConnected", function () {
                // show pane with id "pane_1"
                showPanel( "pane_1" );
            } );

            // when an error occured on the server side
            bc.signaling.bind( "onError", function ( error ) {
                // display an alert message
                alert( error.text + " (" + error.code + ")" );
            } );

            // when the user has joined a room
            bc.signaling.bind( "onJoinedRoom", function ( data ) {
                // set the current room name
                room = data.room;
                members = data.members;
                // ask the user to access to his webcam
                bc.startStream( "webcam-sd", function( stream ){
                    // affect stream to "localStream" var
                    localStream = stream;
                    // when webcam access has been granted
                    // show pane with id "pane_2"
                    showPanel( "pane_2" );
                    // insert the local webcam stream into div#video_container node
                    bc.attachStream( stream, q( "#video_container" ), { mirror: true } );
                    // then, for every single members present in the room ...
                    for ( var i=0, max=members.length; i<max; i++ ) {
                        // ... request a call
                        bc.call( members[ i ].id, room, { "stream": stream } );
                    }
                } );
            } );

            // when an error occurred while trying to join a room
            bc.signaling.bind( "onJoinRoomError", function ( error ) {
                // display an alert message
                alert( error.text + " (" + error.code + ")" );
            } );

            // when the local user has quitted the room
            bc.signaling.bind( "onQuittedRoom", function( room ) {
                // stop the local stream
                bc.stopStream( localStream, function(){
                    // remove the stream from the page
                    bc.detachStream( localStream );
                    // show pane with id "pane_1"
                    showPanel( "pane_1" );
                } );
            } );

            // when a new remote stream is received
            bc.streams.bind( "onStreamAdded", function ( remoteStream ) {
                // insert the new remote stream into div#video_container node
                bc.attachStream( remoteStream, q( "#video_container_2" ) );
            } );

            // when a remote stream has been stopped
            bc.streams.bind( "onStreamClosed", function ( stream ) {
                // remove the stream from the page
                bc.detachStream( stream );
            } );

            // when a local stream cannot be retrieved
            bc.streams.bind( "onStreamError", function( error ){
                switch( error.name ){
                    case "PermissionDeniedError":
                        alert( "Webcam access has not been allowed" );
                        bc.quitRoom( room );
                        break
                    case "DevicesNotFoundError":
                        if( confirm( "No webcam/mic found on this machine. Process call anyway ?" ) ){
                            // show pane with id "pane_2"
                            showPanel( "pane_2" );
                            for ( var i=0, max=members.length; i<max; i++ ) {
                                // ... request a call
                                bc.call( members[ i ].id, room );
                            }
                        }
                        else{
                            bc.quitRoom( room );
                        }
                        break
                }
            } );

            // bind function "joinConference" to button "Join Conference Room"
            q( "#join" ).addEventListener( "click", joinConference );

            // bind function "quitConference" to button "Quit Conference Room"
            q( "#quit" ).addEventListener( "click", quitConference );

            // open a new session on the server
            bc.connect();
        }

        // when button "Join Conference Room" has been clicked
        function joinConference(){
            var roomToJoin = "vineet";
            // if "Conference Name" field is not empty ...
            if( roomToJoin ){
                // ... join the room
                bc.joinRoom( roomToJoin );
            }
            else{
                // otherwise, display an alert
                alert( "you must enter a room name !" )
            }
        }

        // when button "Quit Conference Room" has been clicked
        function quitConference(){
            // quit the current conference room
            bc.quitRoom( room );
        }

        function showPanel( id ){
            var panes = document.querySelectorAll( ".pane" );
            // for all nodes matching the query ".pane"
            for( var i=0, max=panes.length; i<max; i++ ){
                // hide all nodes except the one to show
                panes[ i ].style.display = panes[ i ].id == id ? "block" : "none";
            };
        }

        function q( query ){
            // return the DOM node matching the query
            return document.querySelector( query );
        }
    </script>
    <style type="text/css">
        #video_container{

            margin: 20px;
            text-align: center;
            width:800px;
            height:800px;
            position:absolute;
            top:150px;
            left: 150px;
            z-index: 1;
        }
        #video_container_2{

            margin: 20px;
            text-align: center;
            width:800px;
            height:800px;
            position:absolute;
            top:250px;
            left: 200px;
        }

        video {
            width: 100%;
        }


    </style>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../../index.php">UPSIDE<span>DOWN</span></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../../Students/Profile/signup.php">Student Area</a></li>
                <li><a href="../../Teachers/Profile/signup.php">Teachers Area</a></li>
                <li><a href="../../Courses/courses.php">Courses</a></li>
                <li>       </li>
                <li class="dropdown"><a class="dropdown-toggle" href="profile.php"><?php echo "Hello, "."$singleUser->first_name"; ?> </a></li>
                <li class="dropdown"><a href="../Authentication/logout.php">Logout</a> </li>
            </ul>
        </div>
    </div>
</nav>


<div class="pane" id="pane_1" style="display: block; padding-top: 80px; text-align: center">
    <br>
    <input type="button" value="Start Your Class" id="join" class="btn btn-lg btn-default">
</div>

<div class=" pane" id="pane_2" style="display: none; padding-top: 60px;">
    <div id="video_container"></div>
    <div id="video_container_2"></div>

    <input type="button" value="End Class" id="quit" class="btn btn-danger btn-default btn-block">
    <a href="query.php" class="btn btn-default btn-block">Take feedback from students?</a>
</div>


<script src="../../../../../resources/bootstrap-3.3.7-dist/js/jquery.easing.min.js"></script>
<script src="../../../../../resources/bootstrap-3.3.7-dist/js/custom.js"></script>
</body>
</html>