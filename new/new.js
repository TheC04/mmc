function esci(){
    window.location.href = "./../homepage/homepage.php";
}

function restore(rs, cs, pe, ai, dv, dO, da, pc, fr, dr, sm, dp){
    document.getElementsByName("rs")[1].value = rs;
    document.getElementsByName("cs")[0].value = cs;
    document.getElementsByName("pe")[0].value = pe;
    document.getElementsByName("ai")[0].value = ai;
    document.getElementsByName("dv")[0].value = dv;
    document.getElementsByName("do")[0].value = dO;
    document.getElementsByName("da")[0].value = da;
    document.getElementsByName("pc")[0].value = pc;
    document.getElementsByName("fr")[0].value = fr;
    document.getElementsByName("dr")[0].value = dr;
    if(sm==1){
    	sm=true;
    }else{
    	sm=false;
    }
    if(dp==1){
    	dp=true;
    }else{
    	dp=false;
    }
    document.getElementsByName("sm")[0].checked = sm;
    document.getElementsByName("dp")[0].checked = dp;
}