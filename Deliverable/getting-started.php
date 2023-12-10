<!DOCTYPE html>
<html lang="en">

  <?php include ("./inc/head.inc.php"); ?>

  <body>
    <?php include ("./inc/navbar.inc.php"); ?>

    <main role="main" class="container">
      <div class="jumbotron" style="background-color: #f3f3f3;">
        <h1 style="text-align: center;"><u>Getting Started</u></h1>
        <!--<p class="lead">Lorem ipsum</p>
        <h1>Title</h1>
        <h4>Subtitle</h4>
        <p>
        Text
        </p> -->
        <div>    
          <img src="./images/icons/Logo-facility-cropped.png" class="logo-center" style="width: 35%;"/>
        </div>

        <h1>Introduction</h1>
        <h4>What is SafeGaze?</h4>
        <p>
        This page acts as a guide for how to properly use SafeGaze at its full potential.
        <br><br>SafeGaze is directed towards the physical safety and cybersecurity of sports clubs and facilities. It focusses on providing a safe streaming platform for your members, and thus negates the risk of stalking or harassment of strangers and your members, especially when the participants primarily consist of children. By implementing our system, you will be able to create a secure livestreaming platform which allows your members to safely watch their children taking part in such activities. 
        </p>

        <h4>How it works?</h4>
        <p>
        You will be able to control which members have a SafeGaze account that is linked to your facility, alongside with what times each specific user has access to the livestreams.
        <br><br>
        This application is split into two separate systems: one for the facility, and the other for the facility’s members, each of which can be access through their respected login pages (facility sections = blue & member sections = green).
        </p>

        <h1>Livestreams</h1>
        <h4>Setting up a livestream</h4>
        <p>
        As of the moment, SafeGaze makes use of YouTube livestreams “as a proof of concept”, as private stream hosting platforms require a paid subscription to host a livestream. You will need to create a YouTube livestream that is marked as “Unlisted”, which means it is not searchable within YouTube, yet still can be embedded into websites.
        <br><br>
        To capture video through a DSLR camera and encode the footage to your computer, a “video capture card” is required, which is generally connected with a HDMI cable. Furthermore, OBS software is used to feed the footage directly to the YouTube stream. More information on how to do this can be access through <a href="https://www.digitaltrends.com/computing/how-to-live-stream-on-youtube-with-obs">https://www.digitaltrends.com/computing/how-to-live-stream-on-youtube-with-obs/</a>.
        </p>

        <h4>Linking livestream to SafeGaze</h4>
        <p>
        The next step is to link the YouTube livestream to SafeGaze. Click on “Share” within the YouTube livestream and copy the URL. Paste this into the “Create New Livestream” section in SafeGaze alongside with a title and optional livestream notes.
        <br><br>
        Upon submission, the livestream will now be available to you and your members.
        <br><br>
        To delete a livestream or edit its details, use the specified buttons available in the livestream List.
        </p>

        <h1>Managing members</h1>
        <p>
        A member can sign up for a SafeGaze member’s account and link it with your facility with the use of your Facility Access Code (created in sign up). You can view your access code by navigation to the “Facility Information” section  in the “Manage Facility” page.
        </p>

        <h4>Requests</h4>
        <p>
        When a member signs up, their account will be shown in “Member requests” and will remain pending until you either accept or decline their account.
        <br><br>
        Upon hitting “Accept” you then need to input what times they will have access to the livestreams. 
        </p>

        <h4>Active members</h4>
        <p>
        All members that have access to your facility’s livestreams will be shown under “Active members”. You can change their account’s status and livestream access times by clicking on the “Manage” button displayed to the right of each user.
        </p>

        <h4>Inactive/declined members</h4>
        <p>
        Any members that have been declined or marked as “Inactive” (meaning their account has been disabled), will be listed in the “IDLE members” page.
        </p>

        <h1>Facility information</h1>
        <p>
        Your facility’s information will be displayed to all active members, which includes the following:
          <ul>
            <li>Facility name</li>
            <li>Facility username</li>
            <li>Facility email address</li>
            <li>Facility telephone number</li>
            <li>Facility street address</li>
            <li>Facility postcode</li>
            <li>Facility access code</li>
          </ul> 
          Some of these details can be changed by accessing “Facility Information” in the “Manage Facility” page.
        </p>

        <h1>Issuing messages</h1>
        <p>
        Lastly, you will be able to issue messages to all active members that have a SafeGaze account. By navigating to “Messages” in the “Manage facility” page, you can create new messages, as well as view a list of all existing messages.
        <br><br>
        Messages are marked with an “urgency level”, which can be useful in notifying your members regarding important announcements.
        </p>

      </div>
    </main>

    <div class="filler"></div>


    <?php include ("./inc/footer.inc.php"); ?>
  </body>
</html>