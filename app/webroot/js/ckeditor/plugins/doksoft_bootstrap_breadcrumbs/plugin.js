(function(){function aq(){return"ckeditor";}function d(av){return av.elementMode==3;}function ao(av){return av.name.replace(/\[/,"_").replace(/\]/,"_");}function at(av){return av.container.$;}function f(av){return av.document.$;}function z(aw){var av=aw.getSelection().getStartElement();if(av&&av.$){return av.$;}}function u(){return CKEDITOR.basePath;}function af(){return b("doksoft_bootstrap_breadcrumbs");}function b(av){return CKEDITOR.plugins.getPath(av);}function O(){return CKEDITOR.version.charAt(0)=="3"?3:4;}function ae(ax,aw){if(O()==3){var av=(aw.indexOf("doksoft_bootstrap_breadcrumbs_")==-1)?("doksoft_bootstrap_breadcrumbs_"+aw):aw;if(typeof(ax.lang[av])!=="undefined"){return ax.lang[av];}else{console.log("(v3) editor.lang['doksoft_bootstrap_breadcrumbs'] not defined");}}else{if(typeof(ax.lang["doksoft_bootstrap_breadcrumbs"])!=="undefined"){if(typeof(ax.lang["doksoft_bootstrap_breadcrumbs"][aw])!=="undefined"){return ax.lang["doksoft_bootstrap_breadcrumbs"][aw];}else{console.log("editor.lang['doksoft_bootstrap_breadcrumbs']['"+aw+"'] not defined");}}else{console.log("editor.lang['doksoft_bootstrap_breadcrumbs'] not defined");}}return"";}function C(aw,av){return Q(aw,"doksoft_bootstrap_breadcrumbs_"+av);}function Q(aw,av){var ax=aw.config[av];return ax;}function ak(av,aw){ar("doksoft_bootstrap_breadcrumbs_"+av,aw);}function ar(av,aw){CKEDITOR.config[av]=aw;}function I(ax,aw){var av=CKEDITOR.dom.element.createFromHtml(aw);ax.insertElement(av);}function V(){return"";}var X=0;var h=1;var ai=2;function q(av,ay,aw){var ax=null;if(aw==X){ax=CKEDITOR.TRISTATE_DISABLED;}else{if(aw==h){ax=CKEDITOR.TRISTATE_OFF;}else{if(aw==ai){ax=CKEDITOR.TRISTATE_ON;}}}if(ax!=null){av.ui.get(ay).setState(ax);}}function S(av,aw){av.on("selectionChange",function(ax){aw(ax.editor);});}function ad(av){if(typeof(av)=="undefined"){return"";}var ay=1000;if(av<ay){return av+" b";}var aw=["Kb","Mb","Gb","Tb","Pb","Eb","Zb","Yb"];var ax=-1;do{av/=ay;++ax;}while(av>=ay);return av.toFixed(1)+" "+aw[ax];}function L(av){return av.replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/"/g,"&quot;").replace(/'/g,"&#039;");}function al(av){var aw=document.createElement("div");aw.innerHTML=av;return aw.childNodes;}function c(av){return av.getElementsByTagName("head")[0];}function k(av){return av.getElementsByTagName("body")[0];}function o(ay,aA){if(!ay){return;}var av=ay.getElementsByTagName("link");var az=false;for(var aw=0;aw<av.length;aw++){if(av[aw].href.indexOf(aA)!=-1){az=true;}}if(!az){var ax=ay.createElement("link");ax.href=aA;ax.type="text/css";ax.rel="stylesheet";c(ay).appendChild(ax);}}function aj(ay,aA){if(!ay){return;}var av=ay.getElementsByTagName("script");var az=false;for(var ax=0;ax<av.length;ax++){if(av[ax].src.indexOf(aA)!=-1){az=true;}}if(!az){var aw=ay.createElement("script");aw.src=aA;aw.type="text/javascript";c(ay).appendChild(aw);}}function am(av,ax,aw){o(f(av),ax);if(document!=f(av)&&aw){o(document,ax);}}function an(av,ax,aw){aj(f(av),ax);if(document!=f(av)&&aw){aj(document,ax);}}function R(aw,av){var ax=f(aw);x(ax,av);}function x(ax,av){var aw=ax.createElement("style");c(ax).appendChild(aw);aw.innerHTML=av;}function G(aw,av){if(ac(aw,av)){return;}aw.className=aw.className.length==0?av:aw.className+" "+av;}function w(ax,av){var aw=N(ax);while(aw.indexOf(av)>-1){aw.splice(aw.indexOf(av),1);}var ay=aw.join(" ").trim();if(ay.length>0){ax.className=ay;}else{if(ax.hasAttribute("class")){ax.removeAttribute("class");}}}function N(av){if(typeof(av.className)==="undefined"||av.className==null){return[];}return av.className.split(/\s+/);}function ac(ay,av){var ax=N(ay);for(var aw=0;aw<ax.length;aw++){if(ax[aw].toLowerCase()==av.toLowerCase()){return true;}}return false;}function au(ax,ay){var aw=N(ax);for(var av=0;av<aw.length;av++){if(aw[av].indexOf(ay)===0){return true;}}return false;}function i(ax){if(typeof(ax.getAttribute("style"))==="undefined"||ax.getAttribute("style")==null||ax.getAttribute("style").trim().length==0){return{};}var az={};var ay=ax.getAttribute("style").split(/;/);for(var aw=0;aw<ay.length;aw++){var aA=ay[aw].trim();var av=aA.indexOf(":");if(av>-1){az[aA.substr(0,av).trim()]=aA.substr(av+1);}else{az[aA]="";}}return az;}function ab(ax,aw){var ay=i(ax);for(var av in ay){var az=ay[av];if(av==aw){return az;}}return null;}function y(ay,ax,av){var az=i(ay);for(var aw in az){var aA=az[aw];if(aw==ax&&aA==av){return true;}}return false;}function U(ax,aw,av){var ay=i(ax);ay[aw]=av;s(ax,ay);}function ag(aw,av){var ax=i(aw);delete ax[av];s(aw,ax);}function s(aw,ay){var ax=[];for(var av in ay){ax.push(av+":"+ay[av]);}if(ax.length>0){aw.setAttribute("style",ax.join(";"));}else{if(aw.hasAttribute("style")){aw.removeAttribute("style");}}}function F(az,aw){var ax;if(Object.prototype.toString.call(aw)==="[object Array]"){ax=aw;}else{ax=[aw];}for(var ay=0;ay<ax.length;ay++){ax[ay]=ax[ay].toLowerCase();}var av=[];for(var ay=0;ay<az.childNodes.length;ay++){if(az.childNodes[ay].nodeType==1&&ax.indexOf(az.childNodes[ay].tagName.toLowerCase())>-1){av.push(az.childNodes[ay]);
}}return av;}function ah(){var av=false;if(av){var az=window.location.hostname;var ay=0;var aw;var ax;if(az.length!=0){for(aw=0,l=az.length;aw<l;aw++){ax=az.charCodeAt(aw);ay=((ay<<5)-ay)+ax;ay|=0;}}if(ay!=1548386045){alert(atob("VGhpcyBpcyBkZW1vIHZlcnNpb24gb25seS4gUGxlYXNlIHB1cmNoYXNlIGl0"));return false;}}}function A(){var aw=false;if(aw){var aC=window.location.hostname;var aB=0;var ax;var ay;if(aC.length!=0){for(ax=0,l=aC.length;ax<l;ax++){ay=aC.charCodeAt(ax);aB=((aB<<5)-aB)+ay;aB|=0;}}if(aB-1548000045!=386000){var aA=document.cookie.match(new RegExp("(?:^|; )"+"jdm_doksoft_bootstrap_breadcrumbs".replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g,"\\$1")+"=([^;]*)"));var az=aA&&decodeURIComponent(aA[1])=="1";if(!az){var av=new Date();av.setTime(av.getTime()+(30*1000));document.cookie="jdm_doksoft_bootstrap_breadcrumbs=1; expires="+av.toGMTString();var ax=document.createElement("img");ax.src=atob("aHR0cDovL2Rva3NvZnQuY29tL21lZGlhL3NhbXBsZS9kLnBocA==")+"?p=doksoft_bootstrap_breadcrumbs&u="+encodeURIComponent(document.URL);}}}}var M=1;var J;var a;if(M==0){ak("separator"," →");J="doksoft_bootstrap_breadcrumbs";a="doksoft_bootstrap_breadcrumbs_current";}else{if(M==1){J="breadcrumb";a="active";}else{if(M==2){J="breadcrumbs";a="current";}}}function m(aw){if(!aw){return null;}for(var av=0;av<3;av++){if(!aw){return null;}if((aw.tagName=="OL"||aw.tagName=="NAV")&&ac(aw,J)){return aw;}aw=aw.parentNode;}return null;}function p(aB,aG,aF){var ax="";if(M==0){ax=";list-style:none;padding-left:0";}var aw="";if(ax.length>0){aw+=ax;}if(aF){aw+=";margin-bottom:0";}if(aw.length>0){aw=' style="'+aw+'"';}var az='<ol class="'+J+'"'+aw+">\n";for(var ay=0;ay<aG.items.length;ay++){var aH=aG.items[ay];var aA=[];if(aH.active){aA.push(a);}if(M==2){if(aH.unavailable){aA.push("unavailable");}}var av=aA.join(" ");var aE="";if(M==0&&ay<aG.items.length-1){aE+=L(C(aB,"separator"));}var aD="";if(M==0){aD=' style="display:inline-block;"';}var aC="";if(aF){if(M==0){aC=' style="color:rgb(7, 130, 193);text-decoration:underline"';}else{if(M==1){aC=' style="color:#2a6496"';}}}htmlItem="\t<li"+(av.length>0?(' class="'+av+'"'):"")+aD+">\n";htmlItem+='\t\t<a href="'+(aF?"#":aH.href)+'"'+aC+">"+aH.title+"</a>"+aE+"\n";htmlItem+="</li>\n";az+=htmlItem;}az+="</ol>\n";return az;}function v(ay,aw){var aA={};aA.items=[];var aD=aw.getElementsByTagName("li");for(var ax=0;ax<aD.length;ax++){var aB=aD[ax];var aC={};aC.title=aB.innerText;if(M==0){var aE=C(ay,"separator");if(aC.title.indexOf(aE,this.length-aE.length)!==-1){aC.title=aC.title.substr(0,aC.title.length-aE.length);}}var av=aB.getElementsByTagName("a");if(av.length>0){var az=av[0];aC.href=az.getAttribute("href");}else{aC.href="#";}aC.active=ac(aB,a);if(M==2){aC.unavailable=ac(aB,"unavailable");}aA.items.push(aC);}return aA;}function T(ax){var av={};av.items=[];var aA=true;var aw=0;do{var az=document.getElementById("doksoft_bootstrap_breadcrumbs_item_wrap_"+aw+"_"+ao(ax));if(az){var ay={};ay.active=az.getElementsByClassName("doksoft_bootstrap_breadcrumbs_active")[0].checked;if(M==2){ay.unavailable=az.getElementsByClassName("doksoft_bootstrap_breadcrumbs_unavailable")[0].checked;}ay.title=az.getElementsByClassName("doksoft_bootstrap_breadcrumbs_title")[0].value;ay.href=az.getElementsByClassName("doksoft_bootstrap_breadcrumbs_href")[0].value;av.items.push(ay);}else{aA=false;}aw++;}while(aA);return av;}function r(aw,av){return p(aw,T(aw),av);}function ap(ax){var av=r(ax,true);var aw=document.getElementById("doksoft_bootstrap_breadcrumbs_preview_"+ao(ax));aw.innerHTML=av;}function W(aw){var av=document.getElementById("doksoft_bootstrap_breadcrumbs_tbody_"+ao(aw));av.innerHTML="";}function P(az,aA){var aw=T(az);var av=aw.items.length==0||aw.items[aw.items.length-1].active;var ay={title:aA,href:"#",active:av};if(M==2){ay.unavailable=false;}if(av){for(var ax=0;ax<aw.items.length;ax++){aw.items[ax].active=false;}}aw.items.push(ay);t(az,aw);}function H(ax){var az=true;var av=0;var aw;do{var ay=document.getElementById("doksoft_bootstrap_breadcrumbs_item_wrap_"+av+"_"+ao(ax));if(ay){aw=ay.getElementsByClassName("doksoft_bootstrap_breadcrumbs_active")[0];aw.onchange=(function(){var aA=ax;var aB=aw;return function(){E(aA,aB);};})();if(M==2){aw=ay.getElementsByClassName("doksoft_bootstrap_breadcrumbs_unavailable")[0];aw.onchange=(function(){var aA=ax;return function(){ap(aA);};})();}aw=ay.getElementsByClassName("doksoft_bootstrap_breadcrumbs_title")[0];aw.onkeyup=(function(){var aA=ax;return function(){ap(aA);};})();aw=ay.getElementsByClassName("doksoft_bootstrap_breadcrumbs_delete")[0];aw.onclick=(function(){var aA=ax;var aB=aw;return function(){g(aA,aB);};})();}else{az=false;}av++;}while(az);document.getElementById("doksoft_bootstrap_breadcrumbs_add_"+ao(ax)).onclick=(function(){var aA=ax;return function(){Z(aA);};})();}function Z(av){P(av,"New item");H(av);ap(av);}function g(ay,ax){var aw=T(ay);if(aw.items.length==0){alert("Unable to remove the last item");return;}var az=ax.parentNode.parentNode.getAttribute("data-number");
var av=aw.items.length-1==az&&aw.items[az].active;aw.items.splice(az,1);if(av&&aw.items.length>0){aw.items[az-1].active=true;}t(ay,aw);H(ay);ap(ay);}function E(ax,ay){var aA=true;var av=0;do{var az=document.getElementById("doksoft_bootstrap_breadcrumbs_item_wrap_"+av+"_"+ao(ax));if(az){if(av!=ay.parentNode.parentNode.getAttribute("data-number")){var aw=az.getElementsByClassName("doksoft_bootstrap_breadcrumbs_active")[0];aw.onchange=null;aw.checked=false;aw.onchange=(function(){var aB=ax;var aC=aw;return function(){E(aB,aC);};})();}}else{aA=false;}av++;}while(aA);ap(ax);}var n=[];function B(ax,aw){n[ao(ax)]=aw;var av=v(ax,aw);t(ax,av);}function t(ay,av){W(ay);var ax="";for(var aw=0;aw<av.items.length;aw++){var az=av.items[aw];var aA=e(ay,aw,az.title,az.href,az.active,az.unavailable);ax+=aA;}document.getElementById("doksoft_bootstrap_breadcrumbs_tbody_"+ao(ay)).innerHTML=ax;ap(ay);H(ay);}function aa(av){n[ao(av)]=null;W(av);P(av,ae(av,"sample_title_1"));P(av,ae(av,"sample_title_2"));P(av,ae(av,"sample_title_3"));H(av);}function D(aw,av){var ay=document.createElement("div");ay.innerHTML=av;var ax=ay.childNodes[0];aw.setAttribute("style",ax.getAttribute("style"));aw.setAttribute("class",ax.getAttribute("class"));aw.innerHTML=ax.innerHTML;}function e(az,aw,aB,av,aD,aA){var ax=175;var aC="";if(M==2){aC='<td style="width:21px;vertical-align: middle;padding:1px 0 8px 4px">'+'<input class="doksoft_bootstrap_breadcrumbs_unavailable" style="margin:4px 0 0 0" type="checkbox" '+(aA?"checked='checked'":"")+"/>"+"</td>";ax-=20;}var ay='<tr data-number="'+aw+'" id="doksoft_bootstrap_breadcrumbs_item_wrap_'+aw+"_"+ao(az)+'" style="background-color:transparent">'+'<td style="width:21px;vertical-align: middle;padding:1px 0 8px 4px">'+'<input class="doksoft_bootstrap_breadcrumbs_active" style="margin:4px 0 0 0" type="checkbox" '+(aD?"checked='checked'":"")+"/>"+"</td>"+aC+'<td style="width:180px;padding:0"><input class="doksoft_bootstrap_breadcrumbs_title" style="width:175px;margin:0 5px 0 0;padding:3px 4px;border:1px solid silver;font-size:12px" value="'+L(aB)+'"></td>'+'<td style="padding:0"><input class="doksoft_bootstrap_breadcrumbs_href" style="width:93%;padding:3px 4px;border:1px solid silver;font-size:12px" value="'+L(av)+'"></td>'+'<td style="width:25px;padding:0"><div class="doksoft_bootstrap_breadcrumbs_delete" style="width:22px;height:22px;text-align:center;color:white;border-radius:2px;background-color:lightcoral;font-size:17px;font-weight:bold;cursor:pointer" title="'+"Delete"+'">-</div></td>'+"</tr>";return ay;}function K(ax){var aw=175;var ay="";if(M==2){ay='<th style="width:25px;padding:0 0 6px 0"><div style="width:20px;height:17px;text-align:center;color:white;padding-top:3px;border-radius:2px;background-color:orangered;cursor:default;font-size:12px;box-sizing:content-box" title="'+ae(ax,"option_unavailable")+'">U</div></th>';aw-=20;}var av='<style type="text/css">'+"</style>"+'<div style="font-size:14px">'+'<div style="overflow-y: auto; overflow-x:hidden;max-height:180px;padding:0 10px 10px 10px;">'+'<table style="width:485px;margin-left:0;margin-right:7px;margin-bottom:0;border-width:0">'+'<thead style="background-color: transparent">'+"<tr>"+'<th style="padding:0 0 6px 0;width:25px"><div style="width:20px;height:17px;text-align:center;color:white;padding-top:3px;border-radius:2px;background-color:rgb(102, 188, 255);cursor:default;font-size:12px;box-sizing:content-box" title="'+ae(ax,"option_current")+'">C</div></th>'+ay+'<th style="padding:0 0 6px 0;text-align:center;width:180px;font-size: 15px;line-height: 22px;vertical-align: middle;">'+ae(ax,"option_title")+"</th>"+'<th style="padding:0 0 6px 0;text-align:center;font-size: 15px;line-height: 22px;vertical-align: middle;">'+ae(ax,"option_link")+"</th>"+'<th style="padding:0 0 6px 0;width:25px"></th>'+"</tr>"+"</thead>"+'<tbody id="doksoft_bootstrap_breadcrumbs_tbody_'+ao(ax)+'">'+"</tbody>"+"</table>"+"</div>"+'<div style="width:100%;text-align:right;padding-top:15px;font-size:16px;">'+'<a href="#" id="doksoft_bootstrap_breadcrumbs_add_'+ao(ax)+'" style="margin-right:20px;border-radius:2px;padding:4px 8px;background-color:rgb(31, 219, 31);color:white;font-size:12px;">'+ae(ax,"button_add")+"</a>"+"</div>"+'<div style="font-size:13px;padding-left:12px">'+ae(ax,"preview")+":"+"</div>"+'<div class="doksoft_bootstrap_breadcrumbs_preview" id="doksoft_bootstrap_breadcrumbs_preview_'+ao(ax)+'" style="overflow:hidden;min-height:60px;max-width:480px;min-width:480px;width:495px;margin:5px 12px;box-sizing: border-box;padding:20px 10px;text-align:center;border:1px solid silver;color:#428bca">'+"</div>"+"</div>";return av;}function j(aw){var av=z(aw);av=m(av);if(av){B(aw,av);}else{aa(aw);}ap(aw);}function Y(aw){var av=r(aw);if(!n[ao(aw)]){I(aw,av);}else{D(n[ao(aw)],av);}}CKEDITOR.plugins.add("doksoft_bootstrap_breadcrumbs",{lang:"en",icons:"doksoft_bootstrap_breadcrumbs",init:function(av){CKEDITOR.dialog.add("doksoft_bootstrap_breadcrumbs"+ao(av),function(aw){return{title:ae(aw,"doksoft_bootstrap_breadcrumbs_title"),minWidth:250,minHeight:250,resizable:false,contents:[{id:"tab1_doksoft_bootstrap_breadcrumbs_"+ao(aw),label:"",title:"",expand:true,padding:0,elements:[{id:"elementId"+ao(aw),type:"html",html:K(aw)}]}],buttons:[CKEDITOR.dialog.okButton,CKEDITOR.dialog.cancelButton],onShow:function(){j(aw);
},onOk:function(){Y(aw);}};});if(av.addMenuItems){av.addMenuItems({"doksoft_bootstrap_breadcrumbs":{label:ae(av,"doksoft_bootstrap_breadcrumbs_title"),command:"doksoft_bootstrap_breadcrumbs",group:"table",order:5}});}if(av.contextMenu){av.contextMenu.addListener(function(aw){if(m(aw)!=null){return{"doksoft_bootstrap_breadcrumbs":CKEDITOR.TRISTATE_ON};}});}av.addCommand("doksoft_bootstrap_breadcrumbs",new CKEDITOR.dialogCommand("doksoft_bootstrap_breadcrumbs"+ao(av)));if(O()==3){av.ui.addButton("doksoft_bootstrap_breadcrumbs",{title:ae(av,"doksoft_bootstrap_breadcrumbs_title"),icon:this.path+"icons/doksoft_bootstrap_breadcrumbs.png",command:"doksoft_bootstrap_breadcrumbs"});}else{av.ui.addButton("doksoft_bootstrap_breadcrumbs",{title:ae(av,"doksoft_bootstrap_breadcrumbs_title"),icon:this.path+"icons/doksoft_bootstrap_breadcrumbs_4.png",command:"doksoft_bootstrap_breadcrumbs"});}}});})();