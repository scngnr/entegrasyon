<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<script type="text/javascript">
data = [];
productCheckboxList =[];
function tekilUrunChange(id){
  data[0] = id;    //tekil ürün Seçimi
  localStorage.setItem('modal', JSON.stringify(data));
}

function fiyatScripts(){
  var e = document.getElementById("pazaryeri");
  var value = e.value;
  var text = e.options[e.selectedIndex].text;
  console.log(text);
  $.ajax({
      type: "get",
      url: "/product/check/pazaryeri/" + value,
      success: function(data){
      select = document.getElementById('magza');


      for (var i=0; i<select.length; i++) {
          select.remove(i);
        }
        select.remove(0);
        var opt = document.createElement('option');
        opt.value = "";
        opt.innerHTML = "";
        select.appendChild(opt);

      for (var i = 0; i < data.length; i++) {
        var opt = document.createElement('option');
        opt.value = data[i]['id'];
        opt.innerHTML = data[i]['magazaAdi'];
        select.appendChild(opt);
      }
    }
  });

  fiyatModals(3);
}


function fiyatModals(id){

  switch (id) {
    case 3 : sId = "pazaryeri"; break;
    case 4 : sId = "magza"; break;
    case 5 : sId = "fiyat"; break;
    case 6 : sId = "islem"; break;
    case 7 : sId="islem"; var inputs = document.getElementById('formul'); data[id] = inputs.value; console.log(inputs.value); localStorage.setItem('modal', JSON.stringify(data)); break;

  }

    if(id == 7){

    }else {
      console.log(sId);
    var e = document.getElementById(sId);
    var value = e.value;
    var text = e.options[e.selectedIndex].text;

      data[id] = value;    //pazaryeri Seçimi
      localStorage.setItem('modal', JSON.stringify(data));
    }
}

localStorage.setItem('modal', JSON.stringify(data));

function id(id){
  data[0] = id;    //id Seçimi
  localStorage.setItem('modal', JSON.stringify(data));
}

function selects(pazaryeri){
  var e = document.getElementById(pazaryeri + "Modal");
  var value = e.value;
  var text = e.options[e.selectedIndex].text;


  data[1] = value;    //pazaryeri Seçimi
  localStorage.setItem('modal', JSON.stringify(data));
  console.log(value);

  $.ajax({
      type: "get",
      url: "/product/check/pazaryeri/" + value,
      success: function(data){
      select = document.getElementById(pazaryeri + 'Modalmagza');

      //Select in önceki elemanlarınmı sil
      for (var i=0; i< select.length ; i++) {
          select.remove(i);
        }

        select.remove(0);   //yeni mağazalar yüklendiğinde önceki mağazanın childi kalıyor bunu silmek için eklenmiştir.

      for (var i = 0; i < data.length; i++) {
        var opt = document.createElement('option');
        opt.value = data[i]['id'];
        opt.innerHTML = data[i]['magazaAdi'];
        select.appendChild(opt);
      }
    }
  });

}

function selectMazga(pazaryeri){
  var e = document.getElementById(pazaryeri + "Modalmagza");
  var value = e.value;
  var text = e.options[e.selectedIndex].text;

  data[2] = value;    //pazaryeri Seçimi
    localStorage.setItem('modal', JSON.stringify(data));
}


</script>


<script type="text/javascript">
  var dizi = [];
toogle = 0;



function productCheckboxList(vals){
    console.log(dizi.indexOf());
   if(dizi.indexOf(vals) < 0 ) {
    dizi.push(vals);
  }


  localStorage.setItem('productCheckboxList', JSON.stringify(dizi));
}

function checkAll() {
  var dizi = [];

    if(toogle == 0){
          var aa= document.getElementsByTagName("input");
          for (var i =0; i < aa.length; i++){
              if (aa[i].type == 'checkbox')
                  if(isNaN(aa[i].name)){

                  }else {
                    aa[i].checked = true;
                    if(dizi.indexOf(aa[i].name) < 0 ) {
                      if(Number(aa[i].name) == 0 ){

                      }else {
                        dizi.push( Number(aa[i].name));

                      }
                    }
                  }
          }
          console.log(aa[21].name);
       }
       if(toogle == 1){
             var aa= document.getElementsByTagName("input");
             for (var i =0; i < aa.length; i++){
                 if (aa[i].type == 'checkbox')
                     aa[i].checked = false;
             }
          }
          toogle ++;
          if(toogle == 2){
            toogle = 0;
          }


          localStorage.setItem('productCheckboxList', JSON.stringify(dizi));
    }

    function ajaxPost(attribute){
      data = localStorage.getItem('modal');
      data = JSON.parse(data);
      var query = "";
      product = localStorage.getItem('productCheckboxList');
      switch (attribute) {
        case 1: postUrl = "add";              query = data[1] + "/" + data[2]+ "/" + product; break;
        case 2: postUrl = "status" ;          query = data[1]+ "/" + product;  break;
        case 3: postUrl = "price" ;           query = data[3]+ "/" + data[4]+ "/" + data[5]+ "/" + data[6]+ "/" + data[7]+ "/" + product; break;
        case 4: postUrl = "kategori/fiyat/add/" ; break;
        // case 2: postUrl = "status" ; break;
      }

      console.log(query);
      $.ajax({
          type: "post",
          url: "/product/" + postUrl + "/" + query,
          success: function(product){
          location.reload();
        }
      });
    }
</script>


<script type="text/javascript">
//////////////////////////////////////////////////// Pazaryeri Kategori Seçim Modal için ///////////////////////////////////////////
$(document).ready(function(){
  //pazaryeri seçimi kategori adı arama input bilgisi enter.keypres ile al
  $( "#category_name" ).keypress(function(e) {
    //if(e.keyCode == 13){
      //pazaryeri seçimi kategori adı arama input değerini al
      input = document.getElementById("category_name").value;
      //lokal storage modal bilgisini çek
      modal = localStorage.getItem('modal');
      //json decode et
      modal = JSON.parse(modal);
      //product kategori route çağrıda bulun
      $.ajax({
          type: "get",
          url: "/product/check/category/" + modal[1] + "/" + input,
          //işlem başarılı ise gelen datayı selecte giydir
          success: function(data){
            console.log(data);

            $('#tbody').empty();
            for (var i = 0; i < data.length; i++) {
              $('#tbody').append(`
                <tr >
                 <td class="row-index"> <p>${data[i]['categoryName']} </p> </td>
                 <td class="text-center"> <button class="btn btn-danger remove" onclick="pazaryeriKategoriSec(${data[i]['categoryId']})" type="button">Seç</button> </td>
                </tr>`);
            }
          }
        });
      //}
    });
  });

function pazaryeriKategoriSec(id){

    modal = localStorage.getItem('modal');
    modal = JSON.parse(modal);
    modal[3] = id;    //kategori Seçimi
    localStorage.setItem('modal', JSON.stringify(modal));
    input = document.getElementById("category_name").value;

    $.ajax({
        type: "get",
        url: "/product/check/category/" + modal[1] + "/" + input,
        //işlem başarılı ise gelen datayı selecte giydir
        success: function(data){
          attributeList = [];
          attributeValue = [];
          //attributeList bul
          for (var i = 0; i < data.length; i++) {
            if(data[i]['categoryId'] == modal[3]){
              attributeList = JSON.parse(data[i]['attributeList']);
              attributeValue = JSON.parse(data[i]['attributeValue']);
            }
          }
          console.log(attributeList  );
          console.log(  attributeList.length);
          console.log(attributeValue );
          console.log(attributeValue[354358900] );
          console.log(  attributeValue.length);
           select = document.getElementById('spectValue');

          //Select in önceki elemanlarınmı sil
          // for (var i=0; i< data.length ; i++) {
          //     select.remove(i);
          //   }
            if (attributeList.length > 1) {
              console.log('v1.1');
              for (var i = 0; i < attributeList.length; i++) {
                id = attributeList[i]['id'];
                if(attributeValue[id] != undefined){
                  console.log('spect oluşturuluyor.');
                $('#spect').append(`
                  <!--begin::Input group-->
                  <div id="spect-group" class="fv-row mb-10">
                    <!--begin::Label-->
                    <label class="form-label ">Özellik Adı : <label id="spectValueName-${i}"class="form-label required"> </label> </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select id="spectValue-${i}" onchange="spectValueOnchange2(${i})"   data-control="select2" data-placeholder="Bir seçim yapın..." data-dropdown-parent="#kt_modal_create_account" class="form-select form-select-solid fw-bolder">


                    </select>

                    <!--end::Input-->
                  </div>
                  <!--end::Input group-->
                `);
                $(`#spectValue-${i}`).select2({

                });
                  for (var j = 0; j < attributeValue[id].length; j++) {
                    for (var k = 0; k < attributeValue[id][j].length; k++) {
                      document.getElementById(`spectValueName-${i}`).textContent  = attributeList[i]['name'];
                      select = document.getElementById(`spectValue-${i}`);
                      var opt = document.createElement('option');
                      opt.value = attributeValue[id][j][k]['id'];
                      opt.innerHTML = attributeValue[id][j][k]['name'];
                      select.appendChild(opt);
                    }
                  }
                }
              }
            }else {
              //attributeList sayısına göre input group oluşturuluyor
              console.log('spect oluşturuluyor.');
              $('#spect').append(`
                <!--begin::Input group-->
                <div id="spect-group" class="fv-row mb-10">
                  <!--begin::Label-->
                  <label class="form-label ">Özellik Adı : <label id="spectValueName"class="form-label required"> </label> </label>
                  <!--end::Label-->
                  <!--begin::Input-->
                  <select id="spectValue" onchange="spectValueOnchange()"   data-control="select2" data-placeholder="Bir seçim yapın..." data-dropdown-parent="#kt_modal_create_account" class="form-select form-select-solid fw-bolder">


                  </select>

                  <!--end::Input-->
                </div>
                <!--end::Input group-->
              `);
              $('#spectValue').select2({

              });
              console.log('v1.2');
              document.getElementById('spectValueName').textContent  = attributeList['name'];
              select = document.getElementById('spectValue');
              id = attributeList['id'];
              for (var i = 0; i < attributeValue[id].length; i++) {
                for (var j = 0; j < attributeValue[id][i].length; j++) {
                  var opt = document.createElement('option');
                  opt.value = attributeValue[id][i][j]['id'];
                  opt.innerHTML = attributeValue[id][i][j]['name'];
                  select.appendChild(opt);
                }
              }
            }
            //select.remove(0);   //yeni mağazalar yüklendiğinde önceki mağazanın childi kalıyor bunu silmek için eklenmiştir.



        }
      });
}

//spectValueOnchange
function spectValueOnchange() {

  data = localStorage.getItem('modal');
  data = JSON.parse(data);

  var e = document.getElementById("spectValue");
  var value = e.value;
  var text = e.options[e.selectedIndex].text;

    data[4] = value;    //pazaryeri Seçimi
    localStorage.setItem('modal', JSON.stringify(data));
}

//spectValueOnchange-2
function spectValueOnchange2(id) {

  data = localStorage.getItem('modal');
  data = JSON.parse(data);

  var e = document.getElementById(`spectValue-${id}`);
  var value = e.value;
  var text = e.options[e.selectedIndex].text;

    data[4] = value;    //pazaryeri Seçimi
    localStorage.setItem('modal', JSON.stringify(data));
}
</script>
