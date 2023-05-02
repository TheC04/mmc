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
    alert(ai*dv*dO*da*pc*fr_dr*sm);
}
function getAI(){
    var ai = document.getElementById("ai").value;
    if(ai>25){
        ai=0,85;
    }else if(ai>50){
        ai=0,93;
    }else if(ai>75){
        ai=1;
    }else if(ai>100){
        ai=0,93;
    }else if(ai>125){
        ai=0,85;
    }else if(ai>150){
        ai=0,78;
    }else if(ai>175){
        ai=0;
    }else{
        ai=0,77;
    }
    return ai;
}
function getDV(){
    var dv=document.getElementById("dv").value;
    if(dv>=25){
        dv=1;
    }else if(dv>30){
        dv=0,97;
    }else if(dv>40){
        dv=0,93;
    }else if(dv>50){
        dv=0,91;
    }else if(dv>70){
        dv=0,88;
    }else if(dv>100){
        dv=0,87;
    }else if(dv>150){
        dv=0,86;
    }else if(dv>175){
        dv=0,0;
    }
    return dv;
}
function getDO(){
    var dO=document.getElementById("do").value;
    if(dO>=25){
        dO=1;
    }else if(dO>30){
        dO=0,83;
    }else if(dO>40){
        dO=0,63;
    }else if(dO>50){
        dO=0,50;
    }else if(dO>55){
        dO=0,45;
    }else if(dO>60){
        dO=0,42;
    }else if(dO>63){
        dO=0;
    }
    return dO;
}
function getDA(){
    var da=document.getElementById("da").value;
    if(da>25){
        da=0,90;
    }else if(da>30){
        da=0,81;
    }else if(da>60){
        da=0,71;
    }else if(da>90){
        da=0,52;
    }else if(da>120){
        da=0,57;
    }else if(da>135){
        da=0;
    }else{
        da=1;
    }
    return da;
}
function getPC(){
    var pc=document.getElementById("pc").value;
    if(pc=="Buona"){
        pc=1;
    }else{
        pc=0,9;
    }
    return pc;
}
function getFD(){
    var fr=document.getElementById("fr").value;
    var dr=document.getElementById("dr").value;
    var fr_dr=0;
    if(fr>0,20){
        if(dr<1){
            fr_dr=1;
        }else if(dr<2){
            fr_dr=0,94;
        }else{
            fr_dr=0,85;
        }
    }else if(fr>1){
        if(dr<1){
            fr_dr=0,94;
        }else if(dr<2){
            fr_dr=0,88;
        }else{
            fr_dr=0,75;
        }
    }else if(fr>4){
        if(dr<1){
            fr_dr=0,84;
        }else if(dr<2){
            fr_dr=0,72;
        }else{
            fr_dr=0,45;
        }
    }else if(fr>6){
        if(dr<1){
            fr_dr=0,75;
        }else if(dr<2){
            fr_dr=0,5;
        }else{
            fr_dr=0,27;
        }
    }else if(fr>9){
        if(dr<1){
            fr_dr=0,52;
        }else if(dr<2){
            fr_dr=0,3;
        }else{
            fr_dr=0,52;
        }
    }else if(fr>12){
        if(dr<1){
            fr_dr=0,37;
        }else if(dr<2){
            fr_dr=0,21;
        }else{
            fr_dr=0;
        }
    }else{
        fr_dr=0;
    }
    return fr_dr;
}
function getSM(){
    var sm=document.getElementById("sm").value;
    if(sm==true){
        sm=0,6;
    }else{
        sm=1;
    }
    return sm;
}

function esci(){
    window.location.href = "./../homepage/homepage.php";
}