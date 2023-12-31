<HTML>
  <HEAD>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <TITLE>Multiple Checkbox Select/Deselect - DEMO</TITLE>
  </HEAD>
  <BODY>
    <H2>Multiple Checkbox Select/Deselect - DEMO</H2>
  <table border="1">
  <tr>
    <th><input type="checkbox" id="selectall"/></th>
    <th>Cell phone</th>
    <th>Rating</th>
  </tr> 
  <tr>
    <td align="center"><input type="checkbox" class="case" name="case" /></td>
    <td>BlackBerry Bold 9650</td>
    <td>2/5</td>
  </tr>
  <tr>
    <td align="center"><input type="checkbox" class="case" name="case" /></td>
    <td>Samsung Galaxy</td>
    <td>3.5/5</td>
  </tr>
  <tr>
    <td align="center"><input type="checkbox" class="case" name="case" /></td>
    <td>Droid X</td>
    <td>4.5/5</td>
  </tr>
  <tr>
    <td align="center"><input type="checkbox" class="case" name="case" /></td>
    <td>HTC Desire</td>
    <td>3/5</td>
  </tr>
  <tr>
    <td align="center"><input type="checkbox" class="case" name="case" /></td>
    <td>Apple iPhone 4</td>
    <td>5/5</td>
  </tr>
  </table>
  
  </BODY>
  </HTML>

  <SCRIPT language="javascript">
    $(function(){
    
      // add multiple select / deselect functionality
      $("#selectall").click(function () {
          $('.case').attr('checked', this.checked);
      });
    
      // if all checkbox are selected, check the selectall checkbox
      // and viceversa
      $(".case").click(function(){
    
        if($(".case").length == $(".case:checked").length) {
          $("#selectall").attr("checked", "checked");
        } else {
          $("#selectall").removeAttr("checked");
        }
    
      });
    });
    </SCRIPT>