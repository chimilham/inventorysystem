



  //for pdf file
        $("body").on("click", "#btnExport", function () {
            html2canvas($('#pdf')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL('image/png');
                   

                    var doc= new jsPDF('p','pt','a4');
                        doc.addImage(data,'PNG',10,10);
                        doc = {
                        content: [{
                            image: data,
                            width: 570
                        }]
                    };
                    pdfMake.createPdf(doc).download("Receipt.pdf");
                       
                }
            });
        });
		




var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];

function inWords (num) {
    if ((num = num.toString()).length > 9) return 'overflow';
    n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
    if (!n) return; var str = '';
    str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
    str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
    str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
    str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
    str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
    return str;
}

document.getElementById('number').onkeyup = function () {
    document.getElementById('words').innerHTML = inWords(document.getElementById('number').value);
};
   
	
	

function NumInWords (number) {
  const first = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
  const tens = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];
  const mad = ['', 'thousand', 'million', 'billion', 'trillion'];
  let word = '';

  for (let i = 0; i < mad.length; i++) {
    let tempNumber = number%(100*Math.pow(1000,i));
    if (Math.floor(tempNumber/Math.pow(1000,i)) !== 0) {
      if (Math.floor(tempNumber/Math.pow(1000,i)) < 20) {
        word = first[Math.floor(tempNumber/Math.pow(1000,i))] + mad[i] + ' ' + word;
      } else {
        word = tens[Math.floor(tempNumber/(10*Math.pow(1000,i)))] + '-' + first[Math.floor(tempNumber/Math.pow(1000,i))%10] + mad[i] + ' ' + word;
      }
    }

    tempNumber = number%(Math.pow(1000,i+1));
    if (Math.floor(tempNumber/(100*Math.pow(1000,i))) !== 0) word = first[Math.floor(tempNumber/(100*Math.pow(1000,i)))] + 'hunderd ' + word;
  }
    return word;
}
var words;
var number;
 number= document.getElementById('number').innerHTML;
words=NumInWords(number);
document.getElementById('number').innerHTML="<b>Ngultrum "+words+" only</b>";











