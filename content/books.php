<?php 
    $title = "Product catalog"; //Title for the page.  Used in the <title> tag
    include('html-begin.php');
?>
<main>
<section>
    <div class="box">
<h5>The book is the purest essence of the human soul</h5>
<hr size="1.8px" width="15%" color="DarkKhaki">
	<form action='?page=product.php' method="post" id="form1">
		<div class="field">
			<input class="search" type="text" name="search" placeholder=" &#x1F50E;&#xFE0E; Search...">
			<input type="hidden" name="product" value="<?=basename(__FILE__, "product.php")?>">
			<input class="button"  type="submit" name="sub" value="Submit" />
		</div>
	</form>
</div>
	<h5>Featured Categories</h5> 
<div class="container_cat">
    <div class="child_cat"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeEVWEQnPLUXcS7Ec2phPOiL0rISPXFBT2vw&usqp=CAU" style="width: 25vw; height: auto;" >
        <div class="text_img">
        <p>KIDS STORY</p>
        </div>
    </div>
    <div class="child_cat"><img src="https://99px.ru/sstorage/56/2018/08/mid_303756_795732.jpg" style="width: 25vw; height: auto;" >
        <div class="text_img">
        <p>HISTORY</p>
        </div>
    </div>
    <div class="child_cat"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJ9Uf_KdoHAS7vzQMnZtuCeZYKuADeBr5Gcw&usqp=CAU" style="width: 25vw; height: auto;" >
        <div class="text_img">
        <p>SCIENCE FICTION</p>
        </div>
    </div>
    <div class="child_cat"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSr2BeE0TOtBoBvtPXU3W0OgF8tHCGT6xSc6Q&usqp=CAU" style="width: 25vw; height: auto;" >
        <div class="text_img">
        <p>MEMOIRS</p>
        </div>
    </div>
</div>
<table>
<td class="logo1">
    <img  src="style/pildid/logo.png" alt="logo" style="width: 140px; height: 140px;">
</td>
<td class="news">
    <?php
    include('form3.php');
    ?>
</td>
</table>

<div class="container_books">
<!-- <div class="child_books"><a href="https://ru.wikipedia.org/wiki/%D0%A4%D0%B0%D0%BD%D1%82%D0%B0%D1%81%D1%82%D0%B8%D0%BA%D0%B0"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5b/Byzantinischer_Mosaizist_des_5._Jahrhunderts_002.jpg/250px-Byzantinischer_Mosaizist_des_5._Jahrhunderts_002.jpg" width="15vw" height="auto" alt="foto"></a></div>
<div class="child_books">
				<div class="booktext_img"><p>Viki</p>
                <p>&#9733;&#9733;&#9733;&#9734;&#9734;</p>
                <p>$12</p>
                </div>
            </div> -->
<?php
	$items;
	$cnt = 0;
	$index = 0;
	$command = $yhendus->prepare("SELECT bookId, author, title, genre, cost, picture FROM Books");
	$command->bind_result($id, $author, $title, $genre, $cost, $picture);
	$command->execute();
	while ($command->fetch()) {
		$book = array($id, $author, $title, $genre, $cost, $picture);
		$items[$index] = $book;
		$cnt += 1;
		$index += 1;
	}
	if ($cnt > 0) {

		foreach ($items as $item) {
			//Listing properties of the book
                echo "<div class='child_books'><a href=''><img src='$item[5]' width='15vw' height='auto' alt='foto'></a></div>
                <div class='child_books'>
				    <div class='booktext_img'><p>$item[2]</p>
                        <p>&#9733;&#9733;&#9733;&#9734;&#9734;</p>
                        <p>$$item[4]</p>
                    </div>
                </div>";
			
			//Delete button
			// echo "<td><form action='?page=admin.php' method='post'>
			// 		<input type = 'hidden' name = 'id' value = '$item[0]'/>
			// 		<input type = 'submit' name = 'remove_book' value = 'Remove'/>
			// 		</form></td>";
			// echo "</tr>";
		}
	} else {
		echo "There are currently no books in the database.";
	}
	?>
</div>    
</section>
<?php
    include('html-end.php');
?>