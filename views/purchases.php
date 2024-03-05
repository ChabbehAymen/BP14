<?php require './controller/purchasesController.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <header>

        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
              crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
              integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
              crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <link rel="stylesheet" href="./views/css/purchases.css">
        <script src="./views/js/purchases.js" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<nav class="navbar navbar-light bg-light d-flex align-items-center p-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="/BP14/">
            <i class="fa fa-home"></i>
            Guicher
        </a>
    </div>
</nav>
</header>
<main class="px-24 py-11">
    <div class="d-flex align-items-center justify-between">
        <p class="fw-bold fs-4">Purchased Events</p>
    </div>
    <section class="pt-3">
        <!-- component -->
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                            <thead class="bg-gray-200 border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    #
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Purchases Date
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Tarife Normal
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Tarif Reduit
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Total Price
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $purchases = getPurchases();
//                            var_dump($purchases);
                            if ($purchases !== false) {
                                foreach ($purchases as $purchase):
                                    ?>
                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 facture-row"
                                        userName='<?php echo $purchase['NOM'].' '.$purchase['PRENOM']?>'
                                        email='<?=$purchase['EMAIL']?>'
                                        titre='<?=$purchase['TITRE']?>'
                                        date='<?=$purchase['DATE_ACHAT']?>'
                                        tarifNomalPrix='<?=$purchase['TARIF_NORMAL']?>'
                                        tarifReduit='<?=$purchase['TARIF_REDUIT']?>'
                                        totalNormal='<?=$purchase['TOTAL_NORMAL']?>'
                                        totalReduit='<?=$purchase['TOTAL_REDUIT']?>'
                                        totalBillet='<?=$purchase['TOTAL_BILLET']?>'
                                    >
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 facture-id" ><?= $purchase['NF'] ?></td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <?= $purchase['DATE_ACHAT'] ?>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap count-normal">
                                            <?= $purchase['COUN_NORMAL'] ?>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap count-reduit">
                                            <?= $purchase['COUN_REDUIT'] ?>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap total">
                                            <?= $purchase['TOTAL'] ?>DH
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="#" class="btn btn-outline-warning"><i class="fa fa-file"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach;
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>
<div class="print-window">
    <div class="flex h-screen w-full items-center justify-center bg-gray-600">
        <div class="w-80 rounded bg-gray-50 px-6 pt-8 shadow-lg">
            <div class="flex flex-col justify-center items-center gap-2">
                <h4 class="font-semibold">Guicher</h4>
                <p class="text-xs title">Theatre : Roemo et Juliette</p>
            </div>
            <div class="flex flex-col gap-3 border-b py-6 text-xs">
                <p class="flex justify-between">
                    <span class="text-gray-400">FACTURE:</span>
                    <span class="window-facture-id"></span>
                </p>
                <p class="text-xs date">2024-02-25 04:02:15</p>
            </div>
            <div class="flex flex-col gap-3 pb-6 pt-2 text-xs">
                <table class="w-full text-left">
                    <thead>
                    <tr class="flex">
                        <th class="w-full py-2">Tarif</th>
                        <th class="min-w-[44px] py-2">Prix</th>
                        <th class="min-w-[44px] py-2"> Qte</th>
                        <th class="min-w-[44px] py-2"> Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="flex">
                        <td class="flex-1 py-1">Normal</td>
                        <td class="min-w-[44px] normal-prix">30.00</td>
                        <td class="min-w-[44px] normal-qt">1</td>
                        <td class="min-w-[44px] normal-total">30.00</td>
                    </tr>
                    <tr class="flex py-1">
                        <td class="flex-1">Reduite</td>
                        <td class="min-w-[44px] reduit-prix">25.00</td>
                        <td class="min-w-[44px] reduit-qt">0</td>
                        <td class="min-w-[44px] reduit-total">0</td>
                    </tr>
                    <tr class="flex py-1">
                        <td class="flex-1 fw-bold">total a pay:</td>
                        <td class="min-w-[44px]">-</td>
                        <td class="min-w-[44px] total-billet">1</td>
                        <td class="min-w-[44px] total-prix">30.00</td>
                    </tr>
                    </tbody>
                </table>
                <div class=" border-b border border-dashed"></div>
                <div class="py-4 justify-center items-center flex flex-col gap-2">
                    <div class="flex gap-2">
                        <i class="fa fa-envelope"></i>
                        <p class="email">
                        </p>
                    </div>
                    <div class="d-flex gap-2">
                        <i class="fa fa-phone"></i>
                        <p class="user-name">
                    </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>