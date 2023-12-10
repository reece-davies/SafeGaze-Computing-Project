
function manageUser(memberId)
{
    //window.location = "./unique-programme.php?proid=" + id;
    window.location = "./manage-member.php?memberid=" + memberId;
}

function editLivestream(livestreamId)
{
    window.location = "./edit-livestream.php?livestreamid=" + livestreamId;
}

function facilityInfoSubmitSuccess() {
    alert("Facility information successfully updated.");
  }

function letMemberIn() {
    window.location = "./livestream.php";
}

function checkForm(form)
  {
    if(!form.terms.checked) {
      alert("Please indicate that you accept the Terms and Conditions");
      form.terms.focus();
      return false;
    }
    return true;
  }