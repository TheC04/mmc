function calc(){
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
    var pe=document.getElementById("pe").value;
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
    var pc=document.getElementById("pc").value;
    if(pc=="Buona"){
        pc=1;
    }else{
        pc=0,9;
    }
    var fr=document.getElementById("fr").value;
    var sm=document.getElementById("sm").value;
    
}