// variáveis determinantes de browsers
var isIE  	= (document.all) ? true : false;
var isDOM 	= (document.getElementById && !document.all) ? true : false;

/// <summary> 
/// Mascara de Data para VertisTextBox.
/// </summary>
/// <param name="vertisTextbox">Controle para inserir a mascara</param>
function PictDate(vertisTextbox, evt) 
{ 
        if (isDOM)
            currentKey = evt.which;             
        else
            currentKey = event.keyCode; 
                  
        var iSize = vertisTextbox.value.length + 1; 

        if ( currentKey != 9 && currentKey != 8 && currentKey != 45 && currentKey != 46 && (currentKey < 35 || currentKey > 40)) 
        { 
                if ((currentKey < 48 || currentKey > 57) && (currentKey < 96 || currentKey > 105)) 
                {
                    if(isDOM)
	                    evt.preventDefault();
	                else
                        event.returnValue = false;      
                }
                else 
                { 
                    if ( iSize == 3 || iSize == 6) 
                    {
						vertisTextbox.value += '/';
					}
                } 
        } 
}

/// <summary> 
/// Mascara de Hora para VertisTextBox.
/// </summary>
/// <param name="vertisTextbox">Controle para inserir a mascara</param>
function PictHour(vertisTextbox, evt) 
{ 
        if (isDOM)
            currentKey = evt.which;             
        else
            currentKey = event.keyCode; 
                                            
        var iSize = vertisTextbox.value.length + 1; 

        if ( currentKey != 9 && currentKey != 8 && currentKey != 45 && currentKey != 46 && (currentKey < 35 || currentKey > 40)) 
        { 
                if ((currentKey < 48 || currentKey > 57) && (currentKey < 96 || currentKey > 105)) 
                {
	                if(isDOM)
	                    evt.preventDefault();
	                else                
                        event.returnValue = false;      
                }
                else 
                { 
                    if ( iSize == 3)// || iSize == 6) 
                    {
						vertisTextbox.value += ':';
					}
                } 
        } 
}

/// <summary> 
/// Mascara numerica para VertisTextBox.
/// </summary>
/// <param name="keyCode">Codigo ASCII da tecla pressionada</param>
function PictInt(vertisTextbox, evt)
{   
    if (isDOM)
        currentKey = evt.which;             
    else
        currentKey = event.keyCode; 
        
	if (currentKey >=48 && currentKey <= 57 || currentKey == 0 || currentKey == 8)
		return true;
	else 
	{
	    if(isDOM)
	    {
	        evt.preventDefault();
	    }
	    else
	        event.keyCode = false;
	}
}


/// <summary> 
/// Mascara decimal para VertisTextBox.
/// </summary>
/// <param name="keyCode">Codigo ASCII da tecla pressionada</param>
function keyPress(vertisTextbox, evt)
{
    if (isDOM)
        currentKey = evt.which;             
    else
        currentKey = event.keyCode; 
              
    if ((currentKey >=44 && currentKey <= 57)&& currentKey!=47)
    {
        return true;
    }
	else 
	{
	    if(isDOM)
	        evt.preventDefault();
	    else
		    event.returnValue=false;
	}
}


function onBlurformatN(objInput,nInt,nDec, evt)
{
	 var vl_ret;
     vl_ret = formatNumber(objInput.value,nInt,nDec, evt);
     if(vl_ret!="@ERRO_TAM" && vl_ret!="@ERRO_NVIRG")
     {
        objInput.value = vl_ret;
		return false;
     }  
     else 
	 { 
        objInput.focus();  
		return true;  
     }          
}


function formatNumber(cuInValue,iNumTotal,iNumDecimals, evt) 
{
	var dbInVal = cuInValue;
	var bNegative = false;
	var iInVal = 0;
	var strInVal;
	var strWhole = "", strDec = "";     	
	var strTemp = "", strOut = "";     	
	var iLen = 0;
	var strSoNum;
	var iCnt,iVig ;
	var iPosVig;
	var iNumInt;
	iCnt = 0;
	iVig =0;
	iPosVig=0;
	strSoNum="";

	//total de numeros inteiros
	iNumInt = (iNumTotal - iNumDecimals)   

	if ((dbInVal == ".")|| (dbInVal == ",") || (dbInVal == "") )
	{ 
		return "0";
	}

	dbInVal=remFormatNumber(dbInVal, evt);
	    
	while ( iCnt < dbInVal.length) 
	{                 		
		if ( dbInVal.substring(iCnt, iCnt+1)!= ".")
		{
			if ( dbInVal.substring(iCnt, iCnt+1)==",")
			{
				iPosVig = iCnt;
				iVig++;		  
				strSoNum = strSoNum.concat(".");
			}
			else
			{                
				strSoNum = strSoNum.concat( dbInVal.substring(iCnt, iCnt+1) );
			}
		}
		iCnt++ ; 
	}
	    
	if (iVig>1)
	{
	exibirMensagem ("Número inválido.")   
	return "@ERRO_NVIRG"; //erro muitas virgulas

	}
	    
		
	if(iPosVig==0)
	{
		strWhole = dbInVal.substring(0,dbInVal.length);
		while (strDec.length < iNumDecimals) 
		{                 		
		strDec = "0" + strDec;                 	
		}
	}
	else
	{
		strWhole = dbInVal.substring(0,iPosVig);
		strDec = dbInVal.substring(iPosVig + 1, dbInVal.length);
		if(strDec.length >iNumDecimals)
		{
		strDec = strDec.substring(0,iNumDecimals);
		}
	}

	if (parseInt(strWhole)==0)
	{
		strWhole="0"
	}
	
	if ((strWhole.length > iNumInt))
	{
		exibirMensagem("Número inválido.O número deve possuir " + iNumInt + " inteiros e/ou " + iNumDecimals + " casas decimais");
		return "@ERRO_TAM"; //erro no tamanho do numero
	}

	while (strDec.length < iNumDecimals-1)
	{                 		
		strDec = strDec + "0";                 	
	}

	iLen = strWhole.length;                       	
	
	if (iLen >= 3) 
	{                           		
		while (iLen > 0) 
		{                         			
			strTemp = strWhole.substring(iLen - 3, iLen);                               			
			if (strTemp.length == 3) 
			{
				strOut = "." + strTemp + strOut;                             				
				iLen -= 3;                                   			
			} 
			else 
			{                                 				
				strOut = strTemp + strOut;                                 				
				iLen = 0;                                 			
			}                                 		
		}                                       		

		if (strOut.substring(0, 1) == "-") 
		{
			strOut = strOut.substring(1,strOut.length);
			bNegative = true;
		}

		if (strOut.substring(0, 1) == ".") 
		{
			strWhole = strOut.substring(1, strOut.length);
		} 
		else 
		{                                        			
 			strWhole = strOut;                                         		
	 	}                                         	
	}

	if (bNegative) 
	{  
		return "-" + strWhole + "," + strDec;
    } 
	else 
	{            
		return strWhole + "," + strDec;
	}
}

function remFormatNumber(cuInValue, evt)
{
	var dbInVal = cuInValue;
	var strSoNum;
	var iCnt;
	var inVig;

	iCnt = 0;
	inVig=0;
	strSoNum="";

	if ((dbInVal == ".")|| (dbInVal == ",") || (dbInVal == "") )
	{ 
		return ("0");
	}
	while (iCnt < dbInVal.length) 
	{                 		
		if (dbInVal.substring(iCnt, iCnt+1)!= ".")
		{
			if (dbInVal.substring(0,1)==",")
			{
				strSoNum = "0" + strSoNum.concat(dbInVal.substring(iCnt, iCnt+1));
			}else
			{
        		strSoNum = strSoNum.concat(dbInVal.substring(iCnt, iCnt+1));
			}
		}      

		if ( dbInVal.substring(iCnt, iCnt+1)== ",")
		{
			inVig++;
			if(inVig > 1)
			{
				return "0";
			}
        }
		iCnt++ ; 
	}
    return strSoNum;    
}
