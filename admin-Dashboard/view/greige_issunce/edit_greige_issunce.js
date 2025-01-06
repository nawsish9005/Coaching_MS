function yarnWarpCheck() 
{
    var yarn_warp_get = document.getElementsByClassName("yarn_count_warp")[0].value;
    var yarn_warp = parseFloat(yarn_warp_get);
    var yarn_warp_value1 = document.getElementById("yarn_warp_value1").value;
    var yarn_warp_value2 = document.getElementById("yarn_warp_value2").value;
    var yarn_warp_cond1 = document.getElementById("yarn_warp_cond1").value;
    var yarn_warp_cond2 = document.getElementById("yarn_warp_cond2").value;
    var problem_condition1 = "";
    var problem_condition2 = "";
    var ok1 = "";
    var ok2 = "";

    if(yarn_warp_cond1 == '(')
    {
      if ( !(yarn_warp_value1 < yarn_warp) )
      {
        problem_condition1 = "problem";
      }
      else
      {
        ok1 = "ok";
      }
    }
    else if(yarn_warp_cond1 == '[')
    {
      if ( !(yarn_warp_value1 <= yarn_warp) )
      {
        problem_condition1 = "problem";
      }
      else
      {
        ok1 = "ok";
      }
    }
    else
    {
      if ( !(yarn_warp_value1 >= yarn_warp) )
      {
        problem_condition1 = "problem";
      }
      else
      {
        ok1 = "ok";
      }
    }

    if(yarn_warp_cond2 == ')')
    {
      if ( !(yarn_warp_value2 > yarn_warp) )
      {
        problem_condition2 = "problem";
      }
      else
      {
        ok2 = "ok";
      }
    }

    else if(yarn_warp_cond2 == ']')
    {
      if ( !(yarn_warp_value2 >= yarn_warp) )
      {
        problem_condition2 = "problem";
      }
      else
      {
        ok2 = "ok";
      }
    }

    else
    {
      if ( !(yarn_warp_value2 <= yarn_warp) )
      {
        problem_condition2 = "problem";
      }
      else
      {
        ok2 = "ok";
      }
    }
    
    if ((problem_condition1 == "problem") && (problem_condition2 == "problem")) 
    {
      document.getElementById("yarn_count_warp").style.color = "#ff0000";
    }

    else if ( (ok1 == "ok") && (ok2 == "ok") )
    {
      document.getElementById("yarn_count_warp").style.color = "green";
    }

    else
    {
      document.getElementById("yarn_count_warp").style.color = "#ff0000";
    }

}


function yarnWeftCheck() 
{
    //condition for yarn warp count
    var yarn_weft_get = document.getElementsByClassName("yarn_count_weft")[0].value;
    var yarn_weft = parseFloat(yarn_weft_get);
    var yarn_weft_value1 = document.getElementById("yarn_weft_value1").value;
    var yarn_weft_value2 = document.getElementById("yarn_weft_value2").value;
    var yarn_weft_cond1 = document.getElementById("yarn_weft_cond1").value;
    var yarn_weft_cond2 = document.getElementById("yarn_weft_cond2").value;
    var problem_condition1 = "";
    var problem_condition2 = "";
    var ok1 = "";
    var ok2 = "";

    if(yarn_weft_cond1 == '(')
    {
      if ( !(yarn_weft_value1 < yarn_weft) )
      {
        problem_condition1 = "problem";
      }
      else
      {
        ok1 = "ok";
      }
    }
    else if(yarn_weft_cond1 == '[')
    {
      if ( !(yarn_weft_value1 <= yarn_weft) )
      {
        problem_condition1 = "problem";
      }
      else
      {
        ok1 = "ok";
      }
    }
    else
    {
      if ( !(yarn_weft_value1 >= yarn_weft) )
      {
        problem_condition1 = "problem";
      }
      else
      {
        ok1 = "ok";
      }
    }

    if(yarn_weft_cond2 == ')')
    {
      if ( !(yarn_weft_value2 > yarn_weft) )
      {
        problem_condition2 = "problem";
      }
      else
      {
        ok2 = "ok";
      }
    }

    else if(yarn_weft_cond2 == ']')
    {
      if ( !(yarn_weft_value2 >= yarn_weft) )
      {
        problem_condition2 = "problem";
      }
      else
      {
        ok2 = "ok";
      }
    }

    else
    {
      if ( !(yarn_weft_value2 <= yarn_weft) )
      {
        problem_condition2 = "problem";
      }
      else
      {
        ok2 = "ok";
      }
    }


    if ((problem_condition1 == "problem") && (problem_condition2 == "problem")) 
    {
      document.getElementById("yarn_count_weft").style.color = "#ff0000";
    }

    else if ( (ok1 == "ok") && (ok2 == "ok") )
    {
      document.getElementById("yarn_count_weft").style.color = "green";
    }

    else
    {
      document.getElementById("yarn_count_weft").style.color = "#ff0000";
    }

}


function gsmCheck() 
{
    //condition for yarn warp count
    var gsm_warp_get = document.getElementsByClassName("gsm_count_warp")[0].value;
    var gsm_warp = parseFloat(gsm_warp_get);
    var gsm_warp_value1 = document.getElementById("gsm_warp_value1").value;
    var gsm_warp_value2 = document.getElementById("gsm_warp_value2").value;
    var gsm_warp_cond1 = document.getElementById("gsm_warp_cond1").value;
    var gsm_warp_cond2 = document.getElementById("gsm_warp_cond2").value;
    var problem_condition1 = "";
    var problem_condition2 = "";
    var ok1 = "";
    var ok2 = "";

    if(gsm_warp_cond1 == '(')
    {
      if ( !(gsm_warp_value1 < gsm_warp) )
      {
        problem_condition1 = "problem";
      }
      else
      {
        ok1 = "ok";
      }
    }
    else if(gsm_warp_cond1 == '[')
    {
      if ( !(gsm_warp_value1 <= gsm_warp) )
      {
        problem_condition1 = "problem";
      }
      else
      {
        ok1 = "ok";
      }
    }
    else
    {
      if ( !(gsm_warp_value1 >= gsm_warp) )
      {
        problem_condition1 = "problem";
      }
      else
      {
        ok1 = "ok";
      }
    }

    if(gsm_warp_cond2 == ')')
    {
      if ( !(gsm_warp_value2 > gsm_warp) )
      {
        problem_condition2 = "problem";
      }
      else
      {
        ok2 = "ok";
      }
    }

    else if(gsm_warp_cond2 == ']')
    {
      if ( !(gsm_warp_value2 >= gsm_warp) )
      {
        problem_condition2 = "problem";
      }
      else
      {
        ok2 = "ok";
      }
    }

    else
    {
      if ( !(gsm_warp_value2 <= gsm_warp) )
      {
        problem_condition2 = "problem";
      }
      else
      {
        ok2 = "ok";
      }
    }

    if ((problem_condition1 == "problem") && (problem_condition2 == "problem")) 
    {
      document.getElementById("gsm_count_warp").style.color = "#ff0000";
    }

    else if ( (ok1 == "ok") && (ok2 == "ok") )
    {
      document.getElementById("gsm_count_warp").style.color = "green";
    }

    else
    {
      document.getElementById("gsm_count_warp").style.color = "#ff0000";
    }

}


function fiberWarpPolyesterCheck() 
{
  //condition for yarn warp polyester
  var fiber_warp_polyester = document.getElementsByClassName("fiber_warp_polyester")[0].value;
  var fiber_warp_polyester_input_result = parseFloat(fiber_warp_polyester);
  var fiber_warp_polyester_cond1 = document.getElementById("fiber_warp_polyester_cond1").value;
  var fiber_warp_polyester_cond2 = document.getElementById("fiber_warp_polyester_cond2").value;
  var fiber_warp_polyester_value1 = document.getElementById("fiber_warp_polyester_value1").value;
  var fiber_warp_polyester_value2 = document.getElementById("fiber_warp_polyester_value2").value;
  var problem_condition1 = "";
  var problem_condition2 = "";
  var ok1 = "";
  var ok2 = "";

  if(fiber_warp_polyester_cond1 == '(')
  {
    if ( !(fiber_warp_polyester_value1 < fiber_warp_polyester_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else if(fiber_warp_polyester_cond1 == '[')
  {
    if ( !(fiber_warp_polyester_value1 <= fiber_warp_polyester_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else
  {
    if ( !(fiber_warp_polyester_value1 >= fiber_warp_polyester_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }

  if(fiber_warp_polyester_cond2 == ')')
  {
    if ( !(fiber_warp_polyester_value2 > fiber_warp_polyester_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else if(fiber_warp_polyester_cond2 == ']')
  {
    if ( !(fiber_warp_polyester_value2 >= fiber_warp_polyester_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else
  {
    if ( !(fiber_warp_polyester_value2 <= fiber_warp_polyester_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  if ((problem_condition1 == "problem") && (problem_condition2 == "problem")) 
  {
    document.getElementById("fiber_warp_polyester").style.color = "#ff0000";
  }

  else if ( (ok1 == "ok") && (ok2 == "ok") )
  {
    document.getElementById("fiber_warp_polyester").style.color = "green";
  }

  else
  {
    document.getElementById("fiber_warp_polyester").style.color = "#ff0000";
  }

}


function fiberWarpCottonCheck() 
{
  //condition for yarn warp polyester
  var fiber_warp_cotton = document.getElementsByClassName("fiber_warp_cotton")[0].value;
  var fiber_warp_cotton_input_result = parseFloat(fiber_warp_cotton);
  var fiber_warp_cotton_cond1 = document.getElementById("fiber_warp_cotton_cond1").value;
  var fiber_warp_cotton_cond2 = document.getElementById("fiber_warp_cotton_cond2").value;
  var fiber_warp_cotton_value1 = document.getElementById("fiber_warp_cotton_value1").value;
  var fiber_warp_cotton_value2 = document.getElementById("fiber_warp_cotton_value2").value;
  var problem_condition1 = "";
  var problem_condition2 = "";
  var ok1 = "";
  var ok2 = "";

  if(fiber_warp_cotton_cond1 == '(')
  {
    if ( !(fiber_warp_cotton_value1 < fiber_warp_cotton_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else if(fiber_warp_cotton_cond1 == '[')
  {
    if ( !(fiber_warp_cotton_value1 <= fiber_warp_cotton_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else
  {
    if ( !(fiber_warp_cotton_value1 >= fiber_warp_cotton_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }

  if(fiber_warp_cotton_cond2 == ')')
  {
    if ( !(fiber_warp_cotton_value2 > fiber_warp_cotton_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else if(fiber_warp_cotton_cond2 == ']')
  {
    if ( !(fiber_warp_cotton_value2 >= fiber_warp_cotton_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else
  {
    if ( !(fiber_warp_cotton_value2 <= fiber_warp_cotton_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  if ((problem_condition1 == "problem") && (problem_condition2 == "problem")) 
  {
    document.getElementById("fiber_warp_cotton").style.color = "#ff0000";
  }

  else if ( (ok1 == "ok") && (ok2 == "ok") )
  {
    document.getElementById("fiber_warp_cotton").style.color = "green";
  }

  else
  {
    document.getElementById("fiber_warp_cotton").style.color = "#ff0000";
  }

}

function fiberWarpThiredCheck() 
{
  //condition for yarn warp polyester
  var fiber_warp_thired = document.getElementsByClassName("fiber_warp_thired")[0].value;
  var fiber_warp_thired_input_result = parseFloat(fiber_warp_thired);
  var fiber_warp_thired_cond1 = document.getElementById("fiber_warp_thired_cond1").value;
  var fiber_warp_thired_cond2 = document.getElementById("fiber_warp_thired_cond2").value;
  var fiber_warp_thired_value1 = document.getElementById("fiber_warp_thired_value1").value;
  var fiber_warp_thired_value2 = document.getElementById("fiber_warp_thired_value2").value;
  var problem_condition1 = "";
  var problem_condition2 = "";
  var ok1 = "";
  var ok2 = "";

  if(fiber_warp_thired_cond1 == '(')
  {
    if ( !(fiber_warp_thired_value1 < fiber_warp_thired_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else if(fiber_warp_thired_cond1 == '[')
  {
    if ( !(fiber_warp_thired_value1 <= fiber_warp_thired_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else
  {
    if ( !(fiber_warp_thired_value1 >= fiber_warp_thired_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }

  if(fiber_warp_thired_cond2 == ')')
  {
    if ( !(fiber_warp_thired_value2 > fiber_warp_thired_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else if(fiber_warp_thired_cond2 == ']')
  {
    if ( !(fiber_warp_thired_value2 >= fiber_warp_thired_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else
  {
    if ( !(fiber_warp_thired_value2 <= fiber_warp_thired_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  if ((problem_condition1 == "problem") && (problem_condition2 == "problem")) 
  {
    document.getElementById("fiber_warp_thired").style.color = "#ff0000";
  }

  else if ( (ok1 == "ok") && (ok2 == "ok") )
  {
    document.getElementById("fiber_warp_thired").style.color = "green";
  }

  else
  {
    document.getElementById("fiber_warp_thired").style.color = "#ff0000";
  }

}

function fiberWarpFourthCheck() 
{
  //condition for yarn warp polyester
  var fiber_warp_fourth = document.getElementsByClassName("fiber_warp_fourth")[0].value;
  var fiber_warp_fourth_input_result = parseFloat(fiber_warp_fourth);
  var fiber_warp_fourth_cond1 = document.getElementById("fiber_warp_fourth_cond1").value;
  var fiber_warp_fourth_cond2 = document.getElementById("fiber_warp_fourth_cond2").value;
  var fiber_warp_fourth_value1 = document.getElementById("fiber_warp_fourth_value1").value;
  var fiber_warp_fourth_value2 = document.getElementById("fiber_warp_fourth_value2").value;
  var problem_condition1 = "";
  var problem_condition2 = "";
  var ok1 = "";
  var ok2 = "";

  if(fiber_warp_fourth_cond1 == '(')
  {
    if ( !(fiber_warp_fourth_value1 < fiber_warp_fourth_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else if(fiber_warp_fourth_cond1 == '[')
  {
    if ( !(fiber_warp_fourth_value1 <= fiber_warp_fourth_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else
  {
    if ( !(fiber_warp_fourth_value1 >= fiber_warp_fourth_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }

  if(fiber_warp_fourth_cond2 == ')')
  {
    if ( !(fiber_warp_fourth_value2 > fiber_warp_fourth_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else if(fiber_warp_fourth_cond2 == ']')
  {
    if ( !(fiber_warp_fourth_value2 >= fiber_warp_fourth_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else
  {
    if ( !(fiber_warp_fourth_value2 <= fiber_warp_fourth_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  if ((problem_condition1 == "problem") && (problem_condition2 == "problem")) 
  {
    document.getElementById("fiber_warp_fourth").style.color = "#ff0000";
  }

  else if ( (ok1 == "ok") && (ok2 == "ok") )
  {
    document.getElementById("fiber_warp_fourth").style.color = "green";
  }

  else
  {
    document.getElementById("fiber_warp_fourth").style.color = "#ff0000";
  }

}

function fiberWeftPolyesterCheck() 
{
  //condition for yarn weft polyester
  var fiber_weft_polyester = document.getElementsByClassName("fiber_weft_polyester")[0].value;
  var fiber_weft_polyester_input_result = parseFloat(fiber_weft_polyester);
  var fiber_weft_polyester_cond1 = document.getElementById("fiber_weft_polyester_cond1").value;
  var fiber_weft_polyester_cond2 = document.getElementById("fiber_weft_polyester_cond2").value;
  var fiber_weft_polyester_value1 = document.getElementById("fiber_weft_polyester_value1").value;
  var fiber_weft_polyester_value2 = document.getElementById("fiber_weft_polyester_value2").value;
  var problem_condition1 = "";
  var problem_condition2 = "";
  var ok1 = "";
  var ok2 = "";

  if(fiber_weft_polyester_cond1 == '(')
  {
    if ( !(fiber_weft_polyester_value1 < fiber_weft_polyester_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else if(fiber_weft_polyester_cond1 == '[')
  {
    if ( !(fiber_weft_polyester_value1 <= fiber_weft_polyester_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else
  {
    if ( !(fiber_weft_polyester_value1 >= fiber_weft_polyester_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }

  if(fiber_weft_polyester_cond2 == ')')
  {
    if ( !(fiber_weft_polyester_value2 > fiber_weft_polyester_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else if(fiber_weft_polyester_cond2 == ']')
  {
    if ( !(fiber_weft_polyester_value2 >= fiber_weft_polyester_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else
  {
    if ( !(fiber_weft_polyester_value2 <= fiber_weft_polyester_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  if ((problem_condition1 == "problem") && (problem_condition2 == "problem")) 
  {
    document.getElementById("fiber_weft_polyester").style.color = "#ff0000";
  }

  else if ( (ok1 == "ok") && (ok2 == "ok") )
  {
    document.getElementById("fiber_weft_polyester").style.color = "green";
  }

  else
  {
    document.getElementById("fiber_weft_polyester").style.color = "#ff0000";
  }

}

function fiberWeftCottonCheck() 
{
  //condition for yarn weft cotton
  var fiber_weft_cotton = document.getElementsByClassName("fiber_weft_cotton")[0].value;
  var fiber_weft_cotton_input_result = parseFloat(fiber_weft_cotton);
  var fiber_weft_cotton_cond1 = document.getElementById("fiber_weft_cotton_cond1").value;
  var fiber_weft_cotton_cond2 = document.getElementById("fiber_weft_cotton_cond2").value;
  var fiber_weft_cotton_value1 = document.getElementById("fiber_weft_cotton_value1").value;
  var fiber_weft_cotton_value2 = document.getElementById("fiber_weft_cotton_value2").value;
  var problem_condition1 = "";
  var problem_condition2 = "";
  var ok1 = "";
  var ok2 = "";

  if(fiber_weft_cotton_cond1 == '(')
  {
    if ( !(fiber_weft_cotton_value1 < fiber_weft_cotton_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else if(fiber_weft_cotton_cond1 == '[')
  {
    if ( !(fiber_weft_cotton_value1 <= fiber_weft_cotton_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else
  {
    if ( !(fiber_weft_cotton_value1 >= fiber_weft_cotton_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }

  if(fiber_weft_cotton_cond2 == ')')
  {
    if ( !(fiber_weft_cotton_value2 > fiber_weft_cotton_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else if(fiber_weft_cotton_cond2 == ']')
  {
    if ( !(fiber_weft_cotton_value2 >= fiber_weft_cotton_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else
  {
    if ( !(fiber_weft_cotton_value2 <= fiber_weft_cotton_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  if ((problem_condition1 == "problem") && (problem_condition2 == "problem")) 
  {
    document.getElementById("fiber_weft_cotton").style.color = "#ff0000";
  }

  else if ( (ok1 == "ok") && (ok2 == "ok") )
  {
    document.getElementById("fiber_weft_cotton").style.color = "green";
  }

  else
  {
    document.getElementById("fiber_weft_cotton").style.color = "#ff0000";
  }

}

function fiberWeftThiredCheck() 
{
  //condition for yarn weft thired
  var fiber_weft_thired = document.getElementsByClassName("fiber_weft_thired")[0].value;
  var fiber_weft_thired_input_result = parseFloat(fiber_weft_thired);
  var fiber_weft_thired_cond1 = document.getElementById("fiber_weft_thired_cond1").value;
  var fiber_weft_thired_cond2 = document.getElementById("fiber_weft_thired_cond2").value;
  var fiber_weft_thired_value1 = document.getElementById("fiber_weft_thired_value1").value;
  var fiber_weft_thired_value2 = document.getElementById("fiber_weft_thired_value2").value;
  var problem_condition1 = "";
  var problem_condition2 = "";
  var ok1 = "";
  var ok2 = "";

  if(fiber_weft_thired_cond1 == '(')
  {
    if ( !(fiber_weft_thired_value1 < fiber_weft_thired_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else if(fiber_weft_thired_cond1 == '[')
  {
    if ( !(fiber_weft_thired_value1 <= fiber_weft_thired_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else
  {
    if ( !(fiber_weft_thired_value1 >= fiber_weft_thired_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }

  if(fiber_weft_thired_cond2 == ')')
  {
    if ( !(fiber_weft_thired_value2 > fiber_weft_thired_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else if(fiber_weft_thired_cond2 == ']')
  {
    if ( !(fiber_weft_thired_value2 >= fiber_weft_thired_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else
  {
    if ( !(fiber_weft_thired_value2 <= fiber_weft_thired_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  if ((problem_condition1 == "problem") && (problem_condition2 == "problem")) 
  {
    document.getElementById("fiber_weft_thired").style.color = "#ff0000";
  }

  else if ( (ok1 == "ok") && (ok2 == "ok") )
  {
    document.getElementById("fiber_weft_thired").style.color = "green";
  }

  else
  {
    document.getElementById("fiber_weft_thired").style.color = "#ff0000";
  }

}

function fiberWeftFourthCheck() 
{
  //condition for yarn weft fourth
  var fiber_weft_fourth = document.getElementsByClassName("fiber_weft_fourth")[0].value;
  var fiber_weft_fourth_input_result = parseFloat(fiber_weft_fourth);
  var fiber_weft_fourth_cond1 = document.getElementById("fiber_weft_fourth_cond1").value;
  var fiber_weft_fourth_cond2 = document.getElementById("fiber_weft_fourth_cond2").value;
  var fiber_weft_fourth_value1 = document.getElementById("fiber_weft_fourth_value1").value;
  var fiber_weft_fourth_value2 = document.getElementById("fiber_weft_fourth_value2").value;
  var problem_condition1 = "";
  var problem_condition2 = "";
  var ok1 = "";
  var ok2 = "";

  if(fiber_weft_fourth_cond1 == '(')
  {
    if ( !(fiber_weft_fourth_value1 < fiber_weft_fourth_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else if(fiber_weft_fourth_cond1 == '[')
  {
    if ( !(fiber_weft_fourth_value1 <= fiber_weft_fourth_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else
  {
    if ( !(fiber_weft_fourth_value1 >= fiber_weft_fourth_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }

  if(fiber_weft_fourth_cond2 == ')')
  {
    if ( !(fiber_weft_fourth_value2 > fiber_weft_fourth_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else if(fiber_weft_fourth_cond2 == ']')
  {
    if ( !(fiber_weft_fourth_value2 >= fiber_weft_fourth_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else
  {
    if ( !(fiber_weft_fourth_value2 <= fiber_weft_fourth_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  if ((problem_condition1 == "problem") && (problem_condition2 == "problem")) 
  {
    document.getElementById("fiber_weft_fourth").style.color = "#ff0000";
  }

  else if ( (ok1 == "ok") && (ok2 == "ok") )
  {
    document.getElementById("fiber_weft_fourth").style.color = "green";
  }

  else
  {
    document.getElementById("fiber_weft_fourth").style.color = "#ff0000";
  }

}

function fiberWarpCheck() 
{
    // //condition for yarn warp count
    // var fiber_warp_get = document.getElementsByClassName("fiber_count_warp")[0].value;
    // var fiber_warp = parseFloat(fiber_warp_get);
    // var fiber_warp_value1 = document.getElementById("fiber_warp_value1").value;
    // var fiber_warp_value2 = document.getElementById("fiber_warp_value2").value;
    // var fiber_warp_cond1 = document.getElementById("fiber_warp_cond1").value;
    // var fiber_warp_cond2 = document.getElementById("fiber_warp_cond2").value;
    // var problem_condition1 = "";
    // var problem_condition2 = "";
    // var ok1 = "";
    // var ok2 = "";

    // if(fiber_warp_cond1 == '(')
    // {
    //   if ( !(fiber_warp_value1 < fiber_warp) )
    //   {
    //     problem_condition1 = "problem";
    //   }
    //   else
    //   {
    //     ok1 = "ok";
    //   }
    // }
    // else if(fiber_warp_cond1 == '[')
    // {
    //   if ( !(fiber_warp_value1 <= fiber_warp) )
    //   {
    //     problem_condition1 = "problem";
    //   }
    //   else
    //   {
    //     ok1 = "ok";
    //   }
    // }
    // else
    // {
    //   if ( !(fiber_warp_value1 >= fiber_warp) )
    //   {
    //     problem_condition1 = "problem";
    //   }
    //   else
    //   {
    //     ok1 = "ok";
    //   }
    // }

    // if(fiber_warp_cond2 == ')')
    // {
    //   if ( !(fiber_warp_value2 > fiber_warp) )
    //   {
    //     problem_condition2 = "problem";
    //   }
    //   else
    //   {
    //     ok2 = "ok";
    //   }
    // }

    // else if(fiber_warp_cond2 == ']')
    // {
    //   if ( !(fiber_warp_value2 >= fiber_warp) )
    //   {
    //     problem_condition2 = "problem";
    //   }
    //   else
    //   {
    //     ok2 = "ok";
    //   }
    // }

    // else
    // {
    //   if ( !(fiber_warp_value2 <= fiber_warp) )
    //   {
    //     problem_condition2 = "problem";
    //   }
    //   else
    //   {
    //     ok2 = "ok";
    //   }
    // }

    // if ((problem_condition1 == "problem") && (problem_condition2 == "problem")) 
    // {
    //   document.getElementById("fiber_count_warp").style.color = "#ff0000";
    // }

    // else if ( (ok1 == "ok") && (ok2 == "ok") )
    // {
    //   document.getElementById("fiber_count_warp").style.color = "green";
    // }

    // else
    // {
    //   document.getElementById("fiber_count_warp").style.color = "#ff0000";
    // }

}


function fiberWeftCheck() 
{
    // //condition for yarn warp count
    // var fiber_weft_get = document.getElementsByClassName("fiber_count_weft")[0].value;
    // var fiber_weft = parseFloat(fiber_weft_get);
    // var fiber_weft_value1 = document.getElementById("fiber_weft_value1").value;
    // var fiber_weft_value2 = document.getElementById("fiber_weft_value2").value;
    // var fiber_weft_cond1 = document.getElementById("fiber_weft_cond1").value;
    // var fiber_weft_cond2 = document.getElementById("fiber_weft_cond2").value;
    // var problem_condition1 = "";
    // var problem_condition2 = "";
    // var ok1 = "";
    // var ok2 = "";

    // if(fiber_weft_cond1 == '(')
    // {
    //   if ( !(fiber_weft_value1 < fiber_weft) )
    //   {
    //     problem_condition1 = "problem";
    //   }
    //   else
    //   {
    //     ok1 = "ok";
    //   }
    // }
    // else if(fiber_weft_cond1 == '[')
    // {
    //   if ( !(fiber_weft_value1 <= fiber_weft) )
    //   {
    //     problem_condition1 = "problem";
    //   }
    //   else
    //   {
    //     ok1 = "ok";
    //   }
    // }
    // else
    // {
    //   if ( !(fiber_weft_value1 >= fiber_weft) )
    //   {
    //     problem_condition1 = "problem";
    //   }
    //   else
    //   {
    //     ok1 = "ok";
    //   }
    // }

    // if(fiber_weft_cond2 == ')')
    // {
    //   if ( !(fiber_weft_value2 > fiber_weft) )
    //   {
    //     problem_condition2 = "problem";
    //   }
    //   else
    //   {
    //     ok2 = "ok";
    //   }
    // }

    // else if(fiber_weft_cond2 == ']')
    // {
    //   if ( !(fiber_weft_value2 >= fiber_weft) )
    //   {
    //     problem_condition2 = "problem";
    //   }
    //   else
    //   {
    //     ok2 = "ok";
    //   }
    // }

    // else
    // {
    //   if ( !(fiber_weft_value2 <= fiber_weft) )
    //   {
    //     problem_condition2 = "problem";
    //   }
    //   else
    //   {
    //     ok2 = "ok";
    //   }
    // }


    // if ((problem_condition1 == "problem") && (problem_condition2 == "problem")) 
    // {
    //   document.getElementById("fiber_count_weft").style.color = "#ff0000";
    // }

    // else if ( (ok1 == "ok") && (ok2 == "ok") )
    // {
    //   document.getElementById("fiber_count_weft").style.color = "green";
    // }

    // else
    // {
    //   document.getElementById("fiber_count_weft").style.color = "#ff0000";
    // }

}

function threadEpiCheck() 
{
    //condition for yarn warp count
    var thread_epi_get = document.getElementsByClassName("thread_epi")[0].value;
    var thread_epi = parseFloat(thread_epi_get);
    var thread_epi_value1 = document.getElementById("thread_epi_value1").value;
    var thread_epi_value2 = document.getElementById("thread_epi_value2").value;
    var thread_epi_cond1 = document.getElementById("thread_epi_cond1").value;
    var thread_epi_cond2 = document.getElementById("thread_epi_cond2").value;
    var problem_condition1 = "";
    var problem_condition2 = "";
    var ok1 = "";
    var ok2 = "";

    if(thread_epi_cond1 == '(')
    {
      if ( !(thread_epi_value1 < thread_epi) )
      {
        problem_condition1 = "problem";
      }
      else
      {
        ok1 = "ok";
      }
    }
    else if(thread_epi_cond1 == '[')
    {
      if ( !(thread_epi_value1 <= thread_epi) )
      {
        problem_condition1 = "problem";
      }
      else
      {
        ok1 = "ok";
      }
    }
    else
    {
      if ( !(thread_epi_value1 >= thread_epi) )
      {
        problem_condition1 = "problem";
      }
      else
      {
        ok1 = "ok";
      }
    }

    if(thread_epi_cond2 == ')')
    {
      if ( !(thread_epi_value2 > thread_epi) )
      {
        problem_condition2 = "problem";
      }
      else
      {
        ok2 = "ok";
      }
    }

    else if(thread_epi_cond2 == ']')
    {
      if ( !(thread_epi_value2 >= thread_epi) )
      {
        problem_condition2 = "problem";
      }
      else
      {
        ok2 = "ok";
      }
    }

    else
    {
      if ( !(thread_epi_value2 <= thread_epi) )
      {
        problem_condition2 = "problem";
      }
      else
      {
        ok2 = "ok";
      }
    }


    if ((problem_condition1 == "problem") && (problem_condition2 == "problem")) 
    {
      document.getElementById("thread_epi").style.color = "#ff0000";
    }

    else if ( (ok1 == "ok") && (ok2 == "ok") )
    {
      document.getElementById("thread_epi").style.color = "green";
    }

    else
    {
      document.getElementById("thread_epi").style.color = "#ff0000";
    }

}

function threadPpiCheck() 
{
    //condition for yarn warp count
    var thread_ppi_get = document.getElementsByClassName("thread_ppi")[0].value;
    var thread_ppi = parseFloat(thread_ppi_get);
    var thread_ppi_value1 = document.getElementById("thread_ppi_value1").value;
    var thread_ppi_value2 = document.getElementById("thread_ppi_value2").value;
    var thread_ppi_cond1 = document.getElementById("thread_ppi_cond1").value;
    var thread_ppi_cond2 = document.getElementById("thread_ppi_cond2").value;
    var problem_condition1 = "";
    var problem_condition2 = "";
    var ok1 = "";
    var ok2 = "";

    if(thread_ppi_cond1 == '(')
    {
      if ( !(thread_ppi_value1 < thread_ppi) )
      {
        problem_condition1 = "problem";
      }
      else
      {
        ok1 = "ok";
      }
    }
    else if(thread_ppi_cond1 == '[')
    {
      if ( !(thread_ppi_value1 <= thread_ppi) )
      {
        problem_condition1 = "problem";
      }
      else
      {
        ok1 = "ok";
      }
    }
    else
    {
      if ( !(thread_ppi_value1 >= thread_ppi) )
      {
        problem_condition1 = "problem";
      }
      else
      {
        ok1 = "ok";
      }
    }

    if(thread_ppi_cond2 == ')')
    {
      if ( !(thread_ppi_value2 > thread_ppi) )
      {
        problem_condition2 = "problem";
      }
      else
      {
        ok2 = "ok";
      }
    }

    else if(thread_ppi_cond2 == ']')
    {
      if ( !(thread_ppi_value2 >= thread_ppi) )
      {
        problem_condition2 = "problem";
      }
      else
      {
        ok2 = "ok";
      }
    }

    else
    {
      if ( !(thread_ppi_value2 <= thread_ppi) )
      {
        problem_condition2 = "problem";
      }
      else
      {
        ok2 = "ok";
      }
    }


    if ((problem_condition1 == "problem") && (problem_condition2 == "problem")) 
    {
      document.getElementById("thread_ppi").style.color = "#ff0000";
    }

    else if ( (ok1 == "ok") && (ok2 == "ok") )
    {
      document.getElementById("thread_ppi").style.color = "green";
    }

    else
    {
      document.getElementById("thread_ppi").style.color = "#ff0000";
    }

}

function cancel_greige_issunce_data(pp_version_id)
{
    var pp_no_id = document.getElementById("pp_no_id").value;
    //var pp_version = document.getElementById("pp_version").value;
    $.ajax(
    {
        type: "POST",
        //url: "define_greige_issunce_standards.php",
        url: "show_details_of_pp_version.php",
        data: 
        {
          pp_no_id: pp_no_id, 
          pp_version_id: pp_version_id
        },
        success:function(data)
        {
            $('#retrieve_general_data').html(data);
            greige_issunce_view();
        }
    });
}

function update_greige_issunce_data(pp_version_id)
{
    if(document.getElementsByClassName("custom_date")[0].value == "")
    {
        missing_alert_for_class("custom_date", 0);
        return false;
    }
    if(document.getElementsByClassName("received_quantity")[0].value == "")
    {
        missing_alert_for_class("received_quantity", 0);
        return false;
    }
    if(isNaN(document.getElementsByClassName("received_quantity")[0].value))
    {
        number_alert_for_class("received_quantity", 0);
        return false;
    }
    // if( ((document.getElementById("received_quantity").value) - (document.getElementById("pre_received_quantity2").value)) > 0 )
    // {
    //   missing_alert("Receive Quantity Below or equal Total Quantity");
    //   return false;
    // }
    if(document.getElementsByClassName("yarn_count_warp")[0].value == "")
    {
        missing_alert_for_class("yarn_count_warp", 0);
        return false;
    }
    if(isNaN(document.getElementsByClassName("yarn_count_warp")[0].value))
    {
        number_alert_for_class("yarn_count_warp", 0);
        return false;
    }
    if(document.getElementsByClassName("yarn_count_weft")[0].value == "")
    {
        missing_alert_for_class("yarn_count_weft", 0);
        return false;
    }
    if(isNaN(document.getElementsByClassName("yarn_count_weft")[0].value))
    {
        number_alert_for_class("yarn_count_weft", 0);
        return false;
    }
    if(document.getElementsByClassName("thread_epi")[0].value == "")
    {
        missing_alert_for_class("thread_epi", 0);
        return false;
    }
    if(isNaN(document.getElementsByClassName("thread_epi")[0].value))
    {
        number_alert_for_class("thread_epi", 0);
        return false;
    }
    if(document.getElementsByClassName("thread_ppi")[0].value == "")
    {
        missing_alert_for_class("thread_ppi", 0);
        return false;
    }
    if(isNaN(document.getElementsByClassName("thread_ppi")[0].value))
    {
        number_alert_for_class("thread_ppi", 0);
        return false;
    }
    if(document.getElementsByClassName("gsm_count_warp")[0].value == "")
    {
        missing_alert_for_class("gsm_count_warp", 0);
        return false;
    }
    if(isNaN(document.getElementsByClassName("gsm_count_warp")[0].value))
    {
        number_alert_for_class("gsm_count_warp", 0);
        return false;
    }
    // if(document.getElementsByClassName("fiber_count_warp")[0].value == "")
    // {
    //     missing_alert_for_class("fiber_count_warp", 0);
    //     return false;
    // }
    // if(isNaN(document.getElementsByClassName("fiber_count_warp")[0].value))
    // {
    //     number_alert_for_class("fiber_count_warp", 0);
    //     return false;
    // }
    // if(document.getElementsByClassName("fiber_count_weft")[0].value == "")
    // {
    //     missing_alert_for_class("fiber_count_weft", 0);
    //     return false;
    // }
    // if(isNaN(document.getElementsByClassName("fiber_count_weft")[0].value))
    // {
    //     number_alert_for_class("fiber_count_weft", 0);
    //     return false;
    // }


    if(document.getElementsByClassName("width")[0].value == "")
    {
        missing_alert_for_class("width", 0);
        return false;
    }
    if(isNaN(document.getElementsByClassName("width")[0].value))
    {
        number_alert_for_class("width", 0);
        return false;
    }
    else
    {
        var formdata = new FormData(document.getElementById('gray_issue_form'));
        $.ajax({
        type: "POST",
        url: "edit_greige_issunce_saving.php",// where you wanna post
        data: formdata,
        processData: false,
        contentType: false,
        error: function(jqXHR, textStatus, errorMessage) 
        {
            alert(errorMessage);
        },
        success: function(data) 
        {

            // data = data.replace(/(\r\n|\n|\r)/gm, "");
            // if(data == "No data found")
            // {
            //     info_alert(data);
            // }
            // else
            // {
                //info_alert(data);
            //     window.location = 'gray_issue.php';
            // }
            //success_alert("All Data Save Successfully", "../greige_issunce/greige_issunce_view_by_id.php?greige_issunce_id="+data);
            //var pp_id_number = document.getElementById("pp_no_id").value;
            //var pp_details_number = document.getElementById("pp_details_id").value;
            //success_alert("All Data Save Successfully", "../greige_issunce/greige_issunce_view.php?pp_details_id="+pp_details_number+"&pp_no_id="+pp_id_number);
            var pp_no_id = document.getElementById("pp_no_id").value;
            //var pp_version = document.getElementById("pp_version").value;
            $.ajax(
            {
                type: "POST",
                //url: "define_greige_issunce_standards.php",
                url: "show_details_of_pp_version.php",
                data: 
                {
                  pp_no_id: pp_no_id, 
                  pp_version_id: pp_version_id
                },
                success:function(data)
                {
                    $('#retrieve_general_data').html(data);
                    greige_issunce_view();
                }
            });
        } 
      });
    }
}