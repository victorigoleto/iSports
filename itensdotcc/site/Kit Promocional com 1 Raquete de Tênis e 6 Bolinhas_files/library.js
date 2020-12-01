var isN4  	= (document.layers) ? true : false;
var isIE  	= (document.all) ? true : false;
var isDOM = (document.getElementById && !document.all) ? true : false;
	
function PrintPage()
{
	if (isIE)
		window.print();
	else
		alert('Por favor selecione a opcao "Arquivo -> Imprimir" do menu superior para imprimir.');
}
function GoToNext(size,obj1,obj2)
{
   if(document.getElementById(obj1.id).value.length >=size)
      document.getElementById(obj2.id).focus();
}
function OpenPopup(idPopup, url, popupW, popupH){
	window.open(url, idPopup, 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=no,width=' + popupW + ',height=' + popupH + ',top=55,left=55');
}
function OpenPopupRemenber(url)
{
    window.open(url, 'ProductRemember', 'toolbar=no,status=no,menubar=no,scrollbars=no,resizeable=no,top=100,left=50,width=509,height=547');
} 
function OpenGiftCardPopup(idPopup, url, popupW, popupH){
	window.open(url, idPopup, 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,copyhistory=no,width=' + popupW + ',height=' + popupH + ',top=55,left=55');
}
 function oPenPopupShipCost(zipCode, zipCodeComplement)
 {
    var zipfull = zipCode + zipCodeComplement;
    window.open('popupshipcost.aspx?zip='+zipfull,null ,'width=500,height=200')
    return false;
 }
function ValidateNumberOfChars(textBox, limit, divResponse){

	var validKey = true;
	var obj = document.getElementById(textBox);
	var divResponse = document.getElementById(divResponse);
	var diff = limit - obj.value.length;
	
	if(diff < 0 && 
		window.event.keyCode != 8 &&
		window.event.keyCode != 17 &&
		!(window.event.keyCode >= 33 && window.event.keyCode <= 40) &&
		window.event.keyCode != 46
		)
	{
		obj.value = obj.value.substr(0, limit);
		alert('Atenção: Você não pode exceder ' + limit + ' caracteres neste campo!');
		validKey = false;
	}
	
	divResponse.innerHTML = "Total de <font color=\"red\"><strong>" + obj.value.length + "</strong></font> caracteres digitados de no máximo <strong>" + limit + "</strong>.";
	
	return validKey;
}
function ChangeImage(sWebPath, sImgBig, sImgZoom, idProduct) {
    if (isDOM) {
        document.getElementById("ctl00_ContentSite_imgRegular").src = sWebPath + "/images/product/" + sImgBig
        document.getElementById("ctl00_ContentSite_imgZoom").src = sWebPath + "/images/product/" + sImgZoom
    }
    else if (isN4) {
    document.layers["ctl00_ContentSite_imgRegular"].src = sWebPath + "/images/product/" + sImgBig
        document.layers["ctl00_ContentSite_imgZoom"].src = sWebPath + "/images/product/" + sImgZoom
    }
    else if (isIE) {
        document.all['ctl00_ContentSite_imgRegular'].src = sWebPath + "/images/product/" + sImgBig
        document.all['ctl00_ContentSite_imgZoom'].src = sWebPath + "/images/product/" + sImgZoom
    }
    this.sImgBig = sImgBig;
}
function ChangeZoomImage(sPath, sImgZoomName, oImgZoom)
{
    if (isDOM)
        document.getElementById(oImgZoom).src = sPath + "/images/product/" + sImgZoomName;
    else if (isN4)
        document.layers[oImgZoom].src = sPath + "/images/product/" + sImgZoomName;
    else if (isIE)
        document.all[oImgZoom].src = sPath + "/images/product/" + sImgZoomName;
}
// MENU HEADER
var divModalidades = document.getElementById("divModalidades");
var divPublico = document.getElementById("divPublico");
var divTrofeus = document.getElementById("divTrofeus");
var divOfertas = document.getElementById("divOfertas");
var divLancamento = document.getElementById("divLancamento");

function ShowMenuDiv(nomeDiv) {
    if (nomeDiv) {
        if (isDOM)
            document.getElementById(nomeDiv).className = 'visiblediv';
        else if (isN4)
            document.layers[nomeDiv].className = 'visiblediv';
        else if (isIE)
            document.all[nomeDiv].className = 'visiblediv';
    }
}
function HideMenuDiv(nomeDiv) {
    if (nomeDiv) {
        if (isDOM)
            document.getElementById(nomeDiv).className = 'invisiblediv';
        else if (isN4)
            document.layers[nomeDiv].className = 'invisiblediv';
        else if (isIE)
            document.all[nomeDiv].className = 'invisiblediv';
    }
}
// FIM MENU HEADER
function OpenPopupIndicate(idProduct) {
    pLX = 509;
    pAY = 590;
    xx = parseInt(((screen.width - pLX - 8) / 2));
    yy = parseInt(((screen.height - pAY - 15) / 2));
    pUrl = 'productpopupindicate.aspx?idproduct=' + idProduct;

    s = window.open(pUrl, '', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,copyhistory=no,width=' + pLX + ', height=' + pAY + ', top=' + yy + ', left=' + xx + ', screenX=' + xx + ', screenY=' + yy);
}

document.onclick = function(event){
      var searchLayer;
      if (isDOM)
            searchLayer = document.getElementById("dvLayerSearch");
        else if (isN4)
            searchLayer = document.layers["dvLayerSearch"];
        else if (isIE)
            searchLayer = document.all["dvLayerSearch"];      

      if(isIE){
            if(isNaN(searchLayer)){
                  if(window.event.srcElement.id != searchLayer){
                        searchLayer.style.display = "none";
                  }else{
                        searchLayer.style.display = "block";
                  }
            }
      }else{
            if(isNaN(searchLayer)){
                  if(event.target.id != searchLayer){
                        searchLayer.style.display = "none";
                  }else{
                        searchLayer.style.display = "block";
                  }
            }
      }
}

function execAutoComplete(textBoxId) {
    var $ = jQuery.noConflict();
    var searchTerm = null;
    if (isIE) {
        searchTerm = document.getElementById(textBoxId).getAttribute('value');
    }
    else {
        if (isDOM) {
            searchTerm = document.getElementById(textBoxId).value;
        }
    }            
    if (searchTerm.length > 2) {    
        
        $.ajax({
            type: "POST",
            url: "Default.aspx/SearchItems",
            data: "{'prefixText':'" + searchTerm + "'}",
            contentType: "application/json; charset=utf-8",
            dataType: "json",                    
            success:
                        function(result) {    // Se retornar o resultado esperado
                            if (result.d[0]) {
                                document.getElementById('dvLayerSearch').style.display = "block";
                                $('#dvLayerSearch').setTemplateURL('searchtemplate.htm');
                                $('#dvLayerSearch').processTemplate(result);
                            }
                            else
                                document.getElementById('dvLayerSearch').style.display = "none";
                       }   
        });
    }
    else {
        document.getElementById('dvLayerSearch').style.display = "none";
         }            
    }
        
        
        
function abreChat() {
    var pop_window = window.open("http://www4.directtalk.com.br/server/directtalk_chat.dll/user?S=I&id_s=0B5B00060A3E4001708A&origem=Mercadao", "janela", "width=350,height=350,resizable=0,toolbar=0,location=0,directories=0,status=1,menubar=0");
    pop_window.focus();
}



function ValidateNumber(textBox) {    
    var obj = document.getElementById(textBox);

    if (obj.value == "")
        obj.value = 1;
        
    }

   