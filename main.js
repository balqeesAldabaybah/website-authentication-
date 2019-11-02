
document.getElementById("gameover").hidden = true;

async function getData() {
	const response = await fetch("http://localhost/practice/connAPI.php");
	const data = await response.json();

	return{
		data
	}
}

 getData().then((result)=>{
	result = result["data"];
	var ques = new Array(result.length);
	for(var i=0; i<result.length ; i++)
	{	var optionsArr = new Array(result[i]["No_Options"] );
		for(var op =0 ; op< result[i]["No_Options"] ; op++){
			var name = "Option"+(op+1);
			optionsArr[op]= result[i][name];
		}
		var element = {question : result[i]["question"], options :optionsArr , correct : result[i]["No_CorrectAnswer"]-1}
		ques [i] = element;
	}
	console.log("ques" );
	console.log(ques);


function perpareOptions(index) {
	var options = "" ;
	
	for(var i=0; i < ques[index].options.length ;i++){
		if(i == ques[index].correct){
			
					options = options + "<input type='radio' name='q" +(index+1)  +" ' value='"+(i)+"' id='correct'> </input> " + ques[index].options[i];

		}else
		options = options + "<input type='radio' name='q" +(index+1)  +" ' value='"+(i)+"'> </input> " + ques[index].options[i];
	
	}
	
	return options; 
}

function prepareQues (index){
	
	
	return ques[index].question;
	
}

function fillForm(current){
	document.getElementById("question").innerHTML = prepareQues(current);
	document.getElementById("options").innerHTML = perpareOptions(current);
}
		current =0;
		
		fillForm(current);
		document.getElementById("gameover").hidden = true;
		

		document.getElementById("button").addEventListener("click" , ()=> {
			
			if(current != ques.length-1){
			
				
			//	var radio = document.queryselector('input[name="q'+ (current+1)+'"]:checked').value;
			var radio = document.getElementById("correct").checked;
				if(radio == true){
					current++;
					fillForm(current)
				}
				 else{
					 console.log("wrong");
				 }
			}
			else{
				document.getElementById("gameover").hidden =false;
				document.getElementById("display").hidden = true;
			}
		});
	});
     


 