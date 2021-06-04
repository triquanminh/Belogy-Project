<!-- TO DO LIST
  - delete own posts (user role)
  - delete posts (admin role)
  - fix super long title breaks post UI at index
  - add read more for long post content at index
  - add loading gif when users perform any actions
  - fix infinite scrolling, the host takes many time to load if the user keep scrolling up and down will ajax multiple times
    add a variable to set if it's already ajax-ing or use the .then() method
  - add infinite scrolling to comments / if cannot add load more comments button to trigger ajax
  - profile.php
  - have list of user who likes your post
  - debugging and fixing
  - add fixed-top to navbar on all pages that have navbar
  - search posts
  - show password button on sign up sign in
  - retain file field if other fields is incorrect


  - index: new signed up users table on the right
  - notification when someone comments or likes your post


  ============= DONE ==============
  - likable posts at index //after like, need to find postID to ajax. We can count the order of post and query it in the DB
  - prevent user from /images in url
-->

<?php
    include "includes/header.php";
    include "func/postFunc.php";
    directToCreatePost();
    
    include "includes/nav.php";
    include "func/timeFunc.php";
    $postList = getPostList($conn, 5);
?>

<div class="container main-cont">
  <div class="create-post">
    <div class="row my-3">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-body">
            <div class="create-form d-flex">
              <div class="avatar-wrapper d-flex justify-content-center align-items-center">
                <img class="avatar mr-3" src="image.php?defaultAvatar" alt="">
              </div>
              <form class="w-100 form-create" method="post" action="index.php">
                <div class="form-group m-0">
                  <input type="text" type="submit" name="createpost" class="form-control input-create" placeholder="<?php
                    if($_SESSION['signedIn'] == true) {
                      echo htmlspecialchars($_SESSION['username']) . ", h";
                    } else echo htmlspecialchars("H");
                  ?>ow are you doing today?">
                </div>
              </form>
              <form method="post" action="index.php" class="embedded d-flex justify-content-center align-items-center">
                <button type="submit" name="createpost" id="embedded-btn" class="text-dark input-create p-0"><i class="bi bi-image fa-lg mx-2"></i></button>
                <button type="submit" name="createpost" id="embedded-btn" class="text-dark input-create p-0"><i class="bi bi-link-45deg fa-lg"></i></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="posts">
    <?php
      outputPostList($conn, $postList);
    ?>

  </div>

  <div class="row my-3 mt-5 loading">
    <div class="col-md-8 offset-md-2 d-flex justify-content-center">
      <img src="image.php?loadinggif" width="35px" alt="">
    </div>
  </div>

</div>

<?php
    include "includes/footer.php";
    unsetNotification();
?>



