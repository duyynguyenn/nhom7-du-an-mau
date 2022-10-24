

<div class=" flex justify-center list-none ">

    <div class="">
        <div class="text-center my-[40px] font-bold text-2xl text-red-600 ">
            <p class="text-[35px]">Thịnh Hành</p>
        </div>

        <div class="grid grid-cols-4 gap-32 flex justify-center ">
        <?php if (count($products) == 0) : ?>
        <?php else : ?>
            <?php  foreach($products as $value) :  ?>
            <div>
                 <a href="index.php?chi-tiet&id=<?= $value['id'] ?? "" ?>">
                 <div class="py-4">
                    <img src="<?= CONTENT_URL ?>/image/<?= $value['image'] ?? "" ?>" alt="">
                </div>
                <div href="" class="text-center text-base font-bold  ">
                    <li> <?php echo $value["name"] ?? "" ?></li>
                    <li class="py-2 text-red-600"><?php echo $value["price"] ?? "" ?></li>
                </div>
                 </a>
            </div>
            <?php  endforeach  ?>
            <?php endif ?>
        </div>
    </div>