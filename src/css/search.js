var mini = true;

function toggleSidebar() {
  if (mini) {
    console.log("opening sidebar");
    document.getElementById("collapse1").style.display = "block";

    this.mini = false;
  } else {
    console.log("closing sidebar");
    document.getElementById("collapse1").style.display = "none";
    
    this.mini = true;
  }
}

function idway(){
  document.getElementById("IDcont").style.display = "block";
  document.getElementById("NAMEcont").style.display = "none";
  document.getElementById("PHONEcont").style.display = "none";
  document.getElementById("idbtn").style.backgroundColor= "rgba(250,235,215,0.3)";
  document.getElementById("namebtn").style.backgroundColor= "rgba(0,0,0,0)";
  document.getElementById("phonebtn").style.backgroundColor= "rgba(0,0,0,0)";
  document.getElementById("result").style.display = "none";

}

function nameway(){
  document.getElementById("IDcont").style.display = "none";
  document.getElementById("NAMEcont").style.display = "block";
  document.getElementById("PHONEcont").style.display = "none";
  document.getElementById("idbtn").style.backgroundColor= "rgba(0,0,0,0)";
  document.getElementById("namebtn").style.backgroundColor= "rgba(250,235,215,0.3)";
  document.getElementById("phonebtn").style.backgroundColor= "rgba(0,0,0,0)";
  document.getElementById("result").style.display = "none";

}

function phoneway(){
  document.getElementById("IDcont").style.display = "none";
  document.getElementById("NAMEcont").style.display = "none";
  document.getElementById("PHONEcont").style.display = "block";
  document.getElementById("idbtn").style.backgroundColor= "rgba(0,0,0,0)";
  document.getElementById("namebtn").style.backgroundColor= "rgba(0,0,0,0)";
  document.getElementById("phonebtn").style.backgroundColor= "rgba(250,235,215,0.3)";
  document.getElementById("result").style.display = "none";

}


