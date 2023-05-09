function calc(){
    var ai=getAI();
    var dv=getDV();
    var dO=getDO();
    var da=getDA();
    var pc=getPC();
    var fr_dr=getFD();
    var sm=getSM();
    var pe=document.getElementById("pe").value;
    var iSoll=pe/(ai*dv*dO*da*pc*fr_dr*sm);
    alert(ai+","+ dv+","+ dO+","+ da+","+ pc+","+ fr_dr+","+ sm+","+ pe+","+ iSoll);
}

function esci(){
    window.location.href = "./../homepage/homepage.php";
}