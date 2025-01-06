  </div>

  </div>

  <script src="{{ asset('admin/js/jquery-2.2.4.min.js') }}"></script>
  <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin/js/dataTables.bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin/js/select2.full.min.js') }}"></script>
  <script src="{{ asset('admin/js/jquery.inputmask.js') }}"></script>
  <script src="{{ asset('admin/js/jquery.inputmask.date.extensions.js') }}"></script>
  <script src="{{ asset('admin/js/jquery.inputmask.extensions.js') }}"></script>
  <script src="{{ asset('admin/js/moment.min.js') }}"></script>
  <script src="{{ asset('admin/js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('admin/js/icheck.min.js') }}"></script>
  <script src="{{ asset('admin/js/fastclick.js') }}"></script>
  <script src="{{ asset('admin/js/jquery.sparkline.min.js') }}"></script>
  <script src="{{ asset('admin/js/jquery.slimscroll.min.js') }}"></script>
  <script src="{{ asset('admin/js/jquery.fancybox.pack.js') }}"></script>
  <script src="{{ asset('admin/js/app.min.js') }}"></script>
  <script src="{{ asset('admin/js/jscolor.js') }}"></script>
  <script src="{{ asset('admin/js/on-off-switch.js') }}"></script>
  <script src="{{ asset('admin/js/on-off-switch-onload.js') }}"></script>
  <script src="{{ asset('admin/js/clipboard.min.js') }}"></script>
  <script src="{{ asset('admin/js/demo.js') }}"></script>
  <script src="{{ asset('admin/js/summernote.js') }}"></script>

  <script>
      $(document).ready(function() {
          $('#editor1').summernote({
              height: 300
          });
          $('#editor2').summernote({
              height: 300
          });
          $('#editor3').summernote({
              height: 300
          });
          $('#editor4').summernote({
              height: 300
          });
          $('#editor5').summernote({
              height: 300
          });
      });
      $(".top-cat").on('change', function() {
          var id = $(this).val();
          var dataString = 'id=' + id;
          $.ajax({
              type: "POST",
              url: "get-mid-category.php",
              data: dataString,
              cache: false,
              success: function(html) {
                  $(".mid-cat").html(html);
              }
          });
      });
      $(".mid-cat").on('change', function() {
          var id = $(this).val();
          var dataString = 'id=' + id;
          $.ajax({
              type: "POST",
              url: "get-end-category.php",
              data: dataString,
              cache: false,
              success: function(html) {
                  $(".end-cat").html(html);
              }
          });
      });
      $(".mid-cat").on('change', function() {
          var id = $(this).val();
          var dataString = 'id=' + id;
          $.ajax({
              type: "POST",
              url: "get-low-category.php",
              data: dataString,
              cache: false,
              success: function(html) {
                  $(".low-cat").html(html);
              }
          });
      });
  </script>

  <script>
      $(function() {

          //Initialize Select2 Elements
          $(".select2").select2();

          //Datemask dd/mm/yyyy
          $("#datemask").inputmask("dd-mm-yyyy", {
              "placeholder": "dd-mm-yyyy"
          });
          //Datemask2 mm/dd/yyyy
          $("#datemask2").inputmask("mm-dd-yyyy", {
              "placeholder": "mm-dd-yyyy"
          });
          //Money Euro
          $("[data-mask]").inputmask();

          //Date picker
          $('#datepicker').datepicker({
              autoclose: true,
              format: 'dd-mm-yyyy',
              todayBtn: 'linked',
          });

          $('#datepicker1').datepicker({
              autoclose: true,
              format: 'dd-mm-yyyy',
              todayBtn: 'linked',
          });

          //iCheck for checkbox and radio inputs
          $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
              checkboxClass: 'icheckbox_minimal-blue',
              radioClass: 'iradio_minimal-blue'
          });
          //Red color scheme for iCheck
          $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
              checkboxClass: 'icheckbox_minimal-red',
              radioClass: 'iradio_minimal-red'
          });
          //Flat red color scheme for iCheck
          $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
              checkboxClass: 'icheckbox_flat-green',
              radioClass: 'iradio_flat-green'
          });



          $("#example1").DataTable();
          $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false
          });

          $('#confirm-delete').on('show.bs.modal', function(e) {
              $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
          });

          $('#confirm-approve').on('show.bs.modal', function(e) {
              $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
          });

      });

      function confirmDelete() {
          return confirm("Are you sure want to delete this data?");
      }

      function confirmActive() {
          return confirm("Are you sure want to Active?");
      }

      function confirmInactive() {
          return confirm("Are you sure want to Inactive?");
      }
  </script>

  <script type="text/javascript">
      function showDiv(elem) {
          if (elem.value == 0) {
              document.getElementById('photo_div').style.display = "none";
              document.getElementById('icon_div').style.display = "none";
          }
          if (elem.value == 1) {
              document.getElementById('photo_div').style.display = "block";
              document.getElementById('photo_div_existing').style.display = "block";
              document.getElementById('icon_div').style.display = "none";
          }
          if (elem.value == 2) {
              document.getElementById('photo_div').style.display = "none";
              document.getElementById('photo_div_existing').style.display = "none";
              document.getElementById('icon_div').style.display = "block";
          }
      }

      function showContentInputArea(elem) {
          if (elem.value == 'Full Width Page Layout') {
              document.getElementById('showPageContent').style.display = "block";
          } else {
              document.getElementById('showPageContent').style.display = "none";
          }
      }
  </script>

  <script type="text/javascript">
      $(document).ready(function() {

          $("#btnAddNew").click(function() {

              var rowNumber = $("#ProductTable tbody tr").length;

              var trNew = "";

              var addLink = "<div class=\"upload-btn" + rowNumber +
                  "\"><input type=\"file\" name=\"photo[]\"  style=\"margin-bottom:5px;\"></div>";

              var deleteRow =
                  "<a href=\"javascript:void()\" class=\"Delete btn btn-danger btn-xs\">X</a>";

              trNew = trNew + "<tr> ";

              trNew += "<td>" + addLink + "</td>";
              trNew += "<td style=\"width:28px;\">" + deleteRow + "</td>";

              trNew = trNew + " </tr>";

              $("#ProductTable tbody").append(trNew);

          });

          $('#ProductTable').delegate('a.Delete', 'click', function() {
              $(this).parent().parent().fadeOut('slow').remove();
              return false;
          });

      });

      var items = [];
      for (i = 1; i <= 24; i++) {
          items[i] = document.getElementById("tabField" + i);
      }

      items[1].style.display = 'block';
      items[2].style.display = 'block';
      items[3].style.display = 'block';
      items[4].style.display = 'none';

      items[5].style.display = 'block';
      items[6].style.display = 'block';
      items[7].style.display = 'block';
      items[8].style.display = 'none';

      items[9].style.display = 'block';
      items[10].style.display = 'block';
      items[11].style.display = 'block';
      items[12].style.display = 'none';

      items[13].style.display = 'block';
      items[14].style.display = 'block';
      items[15].style.display = 'block';
      items[16].style.display = 'none';

      items[17].style.display = 'block';
      items[18].style.display = 'block';
      items[19].style.display = 'block';
      items[20].style.display = 'none';

      items[21].style.display = 'block';
      items[22].style.display = 'block';
      items[23].style.display = 'block';
      items[24].style.display = 'none';

      function funcTab1(elem) {
          var txt = elem.value;
          if (txt == 'Image Advertisement') {
              items[1].style.display = 'block';
              items[2].style.display = 'block';
              items[3].style.display = 'block';
              items[4].style.display = 'none';
          }
          if (txt == 'Adsense Code') {
              items[1].style.display = 'none';
              items[2].style.display = 'none';
              items[3].style.display = 'none';
              items[4].style.display = 'block';
          }
      };

      function funcTab2(elem) {
          var txt = elem.value;
          if (txt == 'Image Advertisement') {
              items[5].style.display = 'block';
              items[6].style.display = 'block';
              items[7].style.display = 'block';
              items[8].style.display = 'none';
          }
          if (txt == 'Adsense Code') {
              items[5].style.display = 'none';
              items[6].style.display = 'none';
              items[7].style.display = 'none';
              items[8].style.display = 'block';
          }
      };

      function funcTab3(elem) {
          var txt = elem.value;
          if (txt == 'Image Advertisement') {
              items[9].style.display = 'block';
              items[10].style.display = 'block';
              items[11].style.display = 'block';
              items[12].style.display = 'none';
          }
          if (txt == 'Adsense Code') {
              items[9].style.display = 'none';
              items[10].style.display = 'none';
              items[11].style.display = 'none';
              items[12].style.display = 'block';
          }
      };

      function funcTab4(elem) {
          var txt = elem.value;
          if (txt == 'Image Advertisement') {
              items[13].style.display = 'block';
              items[14].style.display = 'block';
              items[15].style.display = 'block';
              items[16].style.display = 'none';
          }
          if (txt == 'Adsense Code') {
              items[13].style.display = 'none';
              items[14].style.display = 'none';
              items[15].style.display = 'none';
              items[16].style.display = 'block';
          }
      };

      function funcTab5(elem) {
          var txt = elem.value;
          if (txt == 'Image Advertisement') {
              items[17].style.display = 'block';
              items[18].style.display = 'block';
              items[19].style.display = 'block';
              items[20].style.display = 'none';
          }
          if (txt == 'Adsense Code') {
              items[17].style.display = 'none';
              items[18].style.display = 'none';
              items[19].style.display = 'none';
              items[20].style.display = 'block';
          }
      };

      function funcTab6(elem) {
          var txt = elem.value;
          if (txt == 'Image Advertisement') {
              items[21].style.display = 'block';
              items[22].style.display = 'block';
              items[23].style.display = 'block';
              items[24].style.display = 'none';
          }
          if (txt == 'Adsense Code') {
              items[21].style.display = 'none';
              items[22].style.display = 'none';
              items[23].style.display = 'none';
              items[24].style.display = 'block';
          }
      };
  </script>
  <script type="text/javascript">
      //   $('#myfile').change(function() {
      //   // submit the form 
      //       $('#upload_form').submit();
      //   });
      var loader =
          '<div class="loader fixed"><div class="loader-inner"><img src="https://wedigitalindia.com/typecase/assets/images/preloader.svg" alt=""></div></div>';

      function img_change(e) {
          var this_in = $(e);
          var fileInput = $(e)[0].files[0];
          var data_id = $(e).parent("td").attr("data-id");
          var dn = $(e).parent("td").attr("dname");
          var form_data = new FormData();
          $("body").append(loader);
          // console.log("worked",loader);

          form_data.append("file", fileInput);
          form_data.append("data_id", data_id);
          form_data.append("dn", dn);

          $.ajax({
              url: 'img_update.php',
              type: 'POST',
              data: form_data,
              contentType: false,
              processData: false,
              success: function(data) {
                  this_in.prev("img").attr("src", data);
                  // console.log(data);
                  $(".loader").remove();
              }
          });
          // retrive
          // this_in.prev("img").attr("src",val);

      }
  </script>
  <script type="text/javascript">
      document.getElementById("upload_form").onchange = function() {
          // submitting the form
          document.getElementById("upload_form").submit();
      };

      function change_function(e) {
          $(e).next("input").trigger("click");
      }
  </script>

  <script>
      $(document).ready(function() {
          // When the Category dropdown changes
          $('select[name="cat_id"]').on('change', function() {
              var categoryId = $(this).val();
              if (!categoryId) {
                  alert('Please select category');
                  return;
              }
              if (categoryId) {
                  // Make an AJAX request to fetch the subcategories for the selected category
                  $.ajax({
                      url: '{{ route('get.subcategories', ['categoryId' => '__categoryId__']) }}'
                          .replace('__categoryId__', categoryId),
                      type: 'GET',
                      dataType: 'json',
                      success: function(data) {
                          var subcategoryDropdown = $('select[name="mcat_id"]');
                          subcategoryDropdown.empty();
                          subcategoryDropdown.append(
                              '<option value="">Select SubCategory</option>');
                          $.each(data.subcategories, function(key, value) {
                              subcategoryDropdown.append('<option value="' + value
                                  .id + '">' + value.name + '</option>');
                          });
                          // Optionally, reinitialize select2 (if you're using it)
                          subcategoryDropdown.trigger('change');
                      },
                      error: function() {
                          alert('Could not retrieve subcategories.');
                      }
                  });
              } else {
                  // If no category is selected, clear the subcategory dropdown
                  $('select[name="mcat_id"]').empty();
                  $('select[name="mcat_id"]').append('<option value="">Select SubCategory</option>');
              }
          });
      });
  </script>

  <script>
      $(document).ready(function() {
          // When the Brand dropdown changes
          $('select[name="brand_id"]').on('change', function() {
              var brandId = $(this).val();

              // Check if a brand is selected
              if (!brandId) {
                  alert('Please select a brand');
                  return;
              }

              // Make an AJAX request to fetch the models for the selected brand
              $.ajax({
                  url: '{{ route('get.models', ['brandId' => '__brandId__']) }}'.replace(
                      '__brandId__', brandId),
                  type: 'GET',
                  dataType: 'json',
                  success: function(data) {

                      // Ensure models data is available
                      if (data.models && data.models.length > 0) {
                          // Clear the model dropdown before populating it
                          var modelDropdown = $('select[name="model"]');
                          modelDropdown.empty(); // Clear the dropdown
                          modelDropdown.append(
                              '<option value="">Select Model</option>'); // Default option

                          // Populate the model dropdown with fetched models
                          $.each(data.models, function(key, value) {
                              modelDropdown.append('<option value="' + value.id +
                                  '">' + value.name + '</option>');
                          });

                          // Optionally, reinitialize select2 (if you're using it)
                          modelDropdown.trigger('change');
                      } else {
                          alert('No models found for the selected brand.');
                      }
                  },
                  error: function(xhr, status, error) {
                      // Handle AJAX errors and provide more details
                      alert('Could not retrieve models. Error: ' + error);
                  }
              });
          });
      });
  </script>

  <script>
      $(document).ready(function() {
          // When the Brand dropdown changes
          $('select[name="model"]').on('change', function() {
              var modelId = $(this).val();

              // Check if a brand is selected
              if (!modelId) {
                  alert('Please select a model');
                  return;
              }

              // Make an AJAX request to fetch the models for the selected brand
              $.ajax({
                  url: '{{ route('get.submodels', ['modelId' => '__modelId__']) }}'.replace(
                      '__modelId__', modelId),
                  type: 'GET',
                  dataType: 'json',
                  success: function(data) {

                      // Ensure models data is available
                      if (data.models && data.models.length > 0) {
                          // Clear the model dropdown before populating it
                          var modelDropdown = $('select[name="submodel"]');
                          modelDropdown.empty(); // Clear the dropdown
                          modelDropdown.append(
                              '<option value="">Select Model Accessories</option>'
                              ); // Default option

                          // Populate the model dropdown with fetched models
                          $.each(data.models, function(key, value) {
                              modelDropdown.append('<option value="' + value.id +
                                  '">' + value.name + '</option>');
                          });

                          // Optionally, reinitialize select2 (if you're using it)
                          modelDropdown.trigger('change');
                      } else {
                          alert('No submodels found for the selected brand.');
                      }
                  },
                  error: function(xhr, status, error) {
                      // Handle AJAX errors and provide more details
                      alert('Could not retrieve submodels. Error: ' + error);
                  }
              });
          });
      });
  </script>


  <script>
      $(document).ready(function() {
          $(document).on('click', '.delete-image', function() {

              var id = $(this).data('id');
              var image = $(this).data('image');

              $.ajax({
                  url: '{{ route('product-image.delete') }}',
                  method: 'POST',
                  data: {
                      id: id,
                      image: image,
                      _token: '{{ csrf_token() }}' // CSRF token for security (Laravel)
                  },
                  success: function(response) {
                      $('#image-tables').load(document.URL + ' #image-tables');
                      console.log('Item deleted successfully');
                  },
                  error: function(xhr, status, error) {
                      console.log('Error: ' + error);
                  }
              });

          });
      });
  </script>

  <script>
      function addKeyValue(sectionId) {
          const section = $('#' + sectionId);
          const sectionIndex = sectionId.split('-')[1]; // Extract section number from the ID

          const form = $('#dynamic-form');
          const sectionCount = form.find('.section').length;
          console.log(sectionCount);

          const newKeyValueDiv = $('<div></div>').addClass('key-value');

          // Create new key and value input fields
          const keyInput = $('<input>').attr('type', 'text').attr('placeholder', 'Key').attr('name',
              `key-${sectionCount}[]`);
          const valueInput = $('<input>').attr('type', 'text').attr('placeholder', 'Value').attr('name',
              `value-${sectionCount}[]`);

          // Create the remove button
          const deleteButton = $('<button></button>').attr('type', 'button').text('Remove').on('click', function() {
              newKeyValueDiv.remove();
          });

          newKeyValueDiv.append(keyInput, valueInput, deleteButton);
          section.append(newKeyValueDiv);
      }


      // Function to add a new section
      function addSection() {
          const form = $('#dynamic-form');
          const sectionCount = form.find('.section').length + 1; // Determine new section number
          console.log(sectionCount);
          // Create the new section
          const newSection = $('<div></div>').addClass('section').attr('id', `section-${sectionCount}`);

          // Add heading input for the new section
          const headingInput = $('<input>').attr('type', 'text').attr('name', `heading${sectionCount}`).attr(
              'placeholder', 'Section Heading');
          newSection.append(headingInput);

          // Create a new key-value div
          const newKeyValueDiv = $('<div></div>').addClass('key-value').attr('id', `key-value-${sectionCount}`);

          // Add key and value inputs for the new section
          const keyInput = $('<input>').attr('type', 'text').attr('placeholder', 'Key').attr('name',
              `key-${sectionCount}[]`);
          const valueInput = $('<input>').attr('type', 'text').attr('placeholder', 'Value').attr('name',
              `value-${sectionCount}[]`);

          // Create the "Add Key-Value" button
          const addButton = $('<button></button>').attr('type', 'button').text('Add Key-Value').addClass('add-key-value')
              .on('click', function() {
                  addKeyValue(`key-value-${sectionCount}`);
              });

          newKeyValueDiv.append(keyInput, valueInput, addButton);

          // Create the "Add Section" button for the new section
          const sectionAddButton = $('<button></button>').attr('type', 'button').text('Add Section').on('click',
              addSection);

          // Append the new key-value div and "Add Section" button to the new section
          newSection.append(newKeyValueDiv, sectionAddButton);

          // Append the new section to the form
          form.append(newSection);
      }
  </script>

  </body>

  </html>
