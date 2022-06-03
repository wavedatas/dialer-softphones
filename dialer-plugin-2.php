<?php
/*
Plugin Name: Dialer Plugin
Description: Version 2.0.0 of the Telnyx API
*/

// Register and load the plugin
function dialer_load_plugin() {
    register_plugin( 'dialer_plugin' );
}
add_action( 'plugins_init', 'dialer_load_plugin' );

// The plugin Class
class dialer_plugin {

  function __construct() {
    parent::__construct(

      // Base ID of your plugin
      'dialer_plugin',

      // Plugin name will appear in UI
      __('dialer Plugin', 'dialer_plugin_domain'),

      // Plugin description
      array( 'description' => __( 'Show dialer Details in a Plugin', 'dialer_plugin_domain' ), )
    );
  }

  // Creating plugin front-end view
  public function plugin( $args, $instance ) {
    $title = apply_filters( 'plugin_title', $instance['title'] );

    //Only show to me during testing - replace the Xs with your IP address if you want to use this
    //if ($_SERVER['REMOTE_ADDR']==="xxx.xxx.xxx.xxx") {

      // before and after plugin arguments are defined by themes
      echo $args['before_plugin'];
      if ( ! empty( $title ) ) echo $args['before_title'] . $title . $args['after_title'];

      // This is where you run the code and display the output
      $curl = curl_init();
      $url = "https://api.telnyx.com/v2/calls/{call_control_id}";

      curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "telnyx-host: api.telnyx.com/v2",
          "telnyxapi-key: 443e8179-c56f-4b6f-8061-b9f49d7a77a3"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        //Only show errors while testing
        //echo "cURL Error #:" . $err;
      } else {
        //The API returns data in JSON format, so first convert that to an array of data objects
        $responseObj = json_decode($response);


\Telnyx\Telnyx::setApiKey('443e8179-c56f-4b6f-8061-b9f49d7a77a3');

// outgoing call
$call = Call::create([
  'connection_id' => 'uuid',
  'to' => '+18005550199',
  'from' => '+18005550100'
]);
$call->answer();

// incoming call
$call = Call::retrieve("call_control_id");
$call->answer();

\Telnyx\Telnyx::setApiKey('443e8179-c56f-4b6f-8061-b9f49d7a77a3');

$call = Call::create([
  'connection_id' => 'uuid',
  'to' => '+18005550199',
  'from' => '+18005550100'
]);

\Telnyx\Telnyx::setApiKey('443e8179-c56f-4b6f-8061-b9f49d7a77a3');

// outgoing call
$call = Call::create([
  'connection_id' => 'uuid',
  'to' => '+18005550199',
  'from' => '+18005550100'
]);
$call->bridge(['call_control_id' => 'bridge_call_control_id']);

// incoming call
$call = Call::retrieve("call_control_id");
$call->bridge(['call_control_id' => 'bridge_call_control_id']);

\Telnyx\Telnyx::setApiKey('443e8179-c56f-4b6f-8061-b9f49d7a77a3');

// outgoing call
$call = Call::create([
  'connection_id' => 'uuid',
  'to' => '+18005550199',
  'from' => '+18005550100'
]);
$call->hangup();

// incoming call
$call = Call::retrieve("call_control_id");
$call->hangup();

\Telnyx\Telnyx::setApiKey('443e8179-c56f-4b6f-8061-b9f49d7a77a3');

\Telnyx\Call::Create(["client_state" => "aGF2ZSBhIG5pY2UgZGF5ID1d","command_id" => "891510ac-f3e4-11e8-af5b-de00688a4901","max_size" => 20,"max_wait_time_secs" => 600,"queue_name" => "support"]);

\Telnyx\Telnyx::setApiKey('443e8179-c56f-4b6f-8061-b9f49d7a77a3');

// outgoing call
$call = Call::create([
  'connection_id' => 'uuid',
  'to' => '+18005550199',
  'from' => '+18005550100'
]);
$call->fork_start(['target'=>'udp:192.0.2.1:9000']);

// incoming call
$call = Call::retrieve("call_control_id");
$call->fork_start(['target'=>'udp:192.0.2.1:9000']);

\Telnyx\Telnyx::setApiKey('443e8179-c56f-4b6f-8061-b9f49d7a77a3');

// outgoing call
$call = Call::create([
  'connection_id' => 'uuid',
  'to' => '+18005550199',
  'from' => '+18005550100'
]);
$call->fork_stop();

// incoming call
$call = Call::retrieve("call_control_id");
$call->fork_stop();

\Telnyx\Telnyx::setApiKey('443e8179-c56f-4b6f-8061-b9f49d7a77a3');

\Telnyx\Call::Create(["client_state" => "aGF2ZSBhIG5pY2UgZGF5ID1d","command_id" => "891510ac-f3e4-11e8-af5b-de00688a4901"]);

\Telnyx\Telnyx::setApiKey('443e8179-c56f-4b6f-8061-b9f49d7a77a3');

// outgoing call
$call = Call::create([
  'connection_id' => 'uuid',
  'to' => '+18005550199',
  'from' => '+18005550100'
]);
$call->gather_using_audio([
  "audio_url" => "http://example.com/message.wav"
]);

// incoming call
$call = Call::retrieve("call_control_id");
$call->gather_using_audio([
  "audio_url" => "http://example.com/message.wav"
]);

\Telnyx\Telnyx::setApiKey('443e8179-c56f-4b6f-8061-b9f49d7a77a3');

// outgoing call
$call = Call::create([
  'connection_id' => 'uuid',
  'to' => '+18005550199',
  'from' => '+18005550100'
]);
$call->gather_using_speak([
  "language" => "en-US",
  "voice" => "female",
  "payload" => "Telnyx call control test"
]);

// incoming call
$call = Call::retrieve("call_control_id");
$call->gather_using_speak([
  "language" => "en-US",
  "voice" => "female",
  "payload" => "Telnyx call control test"
]);

\Telnyx\Telnyx::setApiKey('443e8179-c56f-4b6f-8061-b9f49d7a77a3');

// outgoing call
$call = Call::create([
  'connection_id' => 'uuid',
  'to' => '+18005550199',
  'from' => '+18005550100'
]);
$call->playback_start(["audio_url" => "http://www.example.com/sounds/greeting.wav"]);

// incoming call
$call = Call::retrieve("call_control_id");
$call->playback_start(["audio_url" => "http://www.example.com/sounds/greeting.wav"]);

\Telnyx\Telnyx::setApiKey('443e8179-c56f-4b6f-8061-b9f49d7a77a3');

// outgoing call
$call = Call::create([
  'connection_id' => 'uuid',
  'to' => '+18005550199',
  'from' => '+18005550100'
]);
$call->playback_stop();

// incoming call
$call = Call::retrieve("call_control_id");
$call->playback_stop();

\Telnyx\Telnyx::setApiKey('443e8179-c56f-4b6f-8061-b9f49d7a77a3');

// outgoing call
$call = Call::create([
  'connection_id' => 'uuid',
  'to' => '+18005550199',
  'from' => '+18005550100'
]);
$call->record_start([
  "format" => "mp3",
  "channels" => "single"
]);

// incoming call
$call = Call::retrieve("call_control_id");
$call->record_start([
  "format" => "mp3",
  "channels" => "single"
]);

\Telnyx\Telnyx::setApiKey('443e8179-c56f-4b6f-8061-b9f49d7a77a3');

// outgoing call
$call = Call::create([
  'connection_id' => 'uuid',
  'to' => '+18005550199',
  'from' => '+18005550100'
]);
$call->record_stop();

// incoming call
$call = Call::retrieve("call_control_id");
$call->record_stop();

\Telnyx\Telnyx::setApiKey('443e8179-c56f-4b6f-8061-b9f49d7a77a3');

// outgoing call
$call = Call::create([
  'connection_id' => 'uuid',
  'to' => '+18005550199',
  'from' => '+18005550100'
]);
$call->reject();

// incoming call
$call = Call::retrieve("call_control_id");
$call->reject();

\Telnyx\Telnyx::setApiKey('443e8179-c56f-4b6f-8061-b9f49d7a77a3');

\Telnyx\Call::Create(["client_state" => "aGF2ZSBhIG5pY2UgZGF5ID1d","command_id" => "891510ac-f3e4-11e8-af5b-de00688a4901"]);

\Telnyx\Telnyx::setApiKey('443e8179-c56f-4b6f-8061-b9f49d7a77a3');

// outgoing call
$call = Call::create([
  'connection_id' => 'uuid',
  'to' => '+18005550199',
  'from' => '+18005550100'
]);
$call->send_dtmf(['digits' => '1www2WABCDw9']);

// incoming call
$call = Call::retrieve("call_control_id");
$call->send_dtmf(['digits' => '1www2WABCDw9']);

\Telnyx\Telnyx::setApiKey('443e8179-c56f-4b6f-8061-b9f49d7a77a3');

$call = new Call("CALL_CONTROL_ID");
$call->transcription_start([
    'language' => 'en'
]);

\Telnyx\Telnyx::setApiKey('443e8179-c56f-4b6f-8061-b9f49d7a77a3');

$call = new Call("CALL_CONTROL_ID");
$call->transcription_stop();

\Telnyx\Telnyx::setApiKey('443e8179-c56f-4b6f-8061-b9f49d7a77a3');

\Telnyx\Call::Update(call_control_id, ["client_state" => "aGF2ZSBhIG5pY2UgZGF5ID1d"]);

}

      echo $args['after_plugin'];

    //} // end check for IP address for testing
  } // end public function plugin

  // Plugin Backend - this controls what you see in the Plugin UI
  //  For this example we are just allowing the plugin title to be entered
  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    } else {
      $title = __( 'Dialer', 'wpb_plugin_domain' );
    }
    // Plugin admin form
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php
  }

  // Updating plugin - replacing old instances with new
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;
  }
} // Class dialer_plugin ends here
?>