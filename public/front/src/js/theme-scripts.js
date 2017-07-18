function changeTraveloElementUI(){tjq(".selector select").each(function(){var obj=tjq(this);if(obj.parent().children(".custom-select").length<1){obj.after("<span class='custom-select'>"+ obj.children("option:selected").html()+"</span>");if(obj.hasClass("white-bg")){obj.next("span.custom-select").addClass("white-bg");}
if(obj.hasClass("full-width")){obj.next("span.custom-select").addClass("full-width");}}});tjq("body").on("change",".selector select",function(){if(tjq(this).next("span.custom-select").length>0){tjq(this).next("span.custom-select").text(tjq(this).children("option:selected").html());}});tjq("body").on("keydown",".selector select",function(){if(tjq(this).next("span.custom-select").length>0){tjq(this).next("span.custom-select").text(tjq(this).children("option:selected").html());}});}
tjq(document).ready(function(){changeTraveloElementUI();});


