<?php
session_start();
// if (!isset($_SESSION["id"]) && !isset($_SESSION["username"])) {
//     header('location: login.php');
// }
?>
<!DOCTYPE html>
<html lang="pl" class='dark'>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Główna / X</title>
    <link rel="mask-icon" sizes="any" href="https://abs.twimg.com/responsive-web/client-web/icon-svg.ea5ff4aa.svg"
        color="#1D9BF0">
    <link rel="shortcut icon" href="https://abs.twimg.com/favicons/twitter.3.ico">
    <link rel="apple-touch-icon" sizes="192x192"
        href="https://abs.twimg.com/responsive-web/client-web/icon-ios.77d25eba.png" />
    <!-- <link href="/dist/output.css" rel="stylesheet"> -->
    <link href="../../dist/output.css" rel="stylesheet">
</head>
<style>
    .nic {
        display: none !important;
    }
</style>

<body class="md:flex justify-center bg-black w-full h-full min-h-screen">
    <div class="h-screen text-white hidden md:block">
        <ul class="px-2 py-1 gap-1 flex flex-col w-[275px] relative">
            <div class="fixed">
                <li class="w-[259px] h-[58px] py-1 flex justify-start group -mt-[6px]">
                    <a href="./index.php">
                        <div
                            class="h-[50.25px] p-3 flex group-hover:bg-[rgba(231,233,234,0.1)] transition-all rounded-full cursor-pointer">
                            <svg viewBox="0 0 24 24" aria-hidden="true" class="svg">
                                <g>
                                    <path
                                        d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"
                                        fill="#fff"></path>
                                </g>
                            </svg>
                        </div>
                        <a />
                </li>
                <?php
                if (isset($_SESSION["id"]) && isset($_SESSION["username"])) {
                    echo "<script>const loggedIn = true</script>";
                    if ($_SESSION['isAdmin']) {
                        echo '
                        <li class="w-[259px] h-[58px] py-1 flex justify-start group -mt-[6px]">
                        <label for="adminMode">
                        <div
                        class="h-[50.25px] p-3 flex group-hover:bg-[rgba(231,233,234,0.1)] transition-all rounded-full cursor-pointer">
                        Admin Mode
                        <input type="checkbox" class="ml-3 toggle" name="adminMode" id="adminMode" onchange="adminModeCheckbox(this)"';
                        if (isset($_GET['admin']) && $_GET['admin'] == "true" && isset($_GET['admin'])) {
                            echo "checked";
                        }
                        echo '
                        </div>
                        <label/>
                        </li>';
                    }
                } else {
                    echo '
                    <li class="w-64 h-14 flex justify-start group -mt-[2px]">
                    <div
                        class="h-[50.25px] p-3 flex group-hover:bg-[rgba(231,233,234,0.1)] transition-all rounded-full cursor-pointer">
                        <svg viewBox="0 0 24 24" aria-hidden="true" class="svg">
                            <g>
                                <path
                                    d="M5.651 19h12.698c-.337-1.8-1.023-3.21-1.945-4.19C15.318 13.65 13.838 13 12 13s-3.317.65-4.404 1.81c-.922.98-1.608 2.39-1.945 4.19zm.486-5.56C7.627 11.85 9.648 11 12 11s4.373.85 5.863 2.44c1.477 1.58 2.366 3.8 2.632 6.46l.11 1.1H3.395l.11-1.1c.266-2.66 1.155-4.88 2.632-6.46zM12 4c-1.105 0-2 .9-2 2s.895 2 2 2 2-.9 2-2-.895-2-2-2zM8 6c0-2.21 1.791-4 4-4s4 1.79 4 4-1.791 4-4 4-4-1.79-4-4z"
                                    fill="#fff"></path>
                            </g>
                        </svg>
                        <div class="pr-4 pl-5 text-xl leading-6"><a href="./login.php">Zaloguj się</a></div>
                    </div>
                </li>
                ';
                    echo "<script>const loggedIn = false</script>";
                }
                ?>
                <script>
                    function hideElements() {
                        if (!loggedIn) {
                            [...document.getElementsByClassName('hide')].forEach(el => {
                                console.log(el);
                                el.classList.add('nic');
                            })
                        }
                    }
                </script>
                <li class="w-[259px] h-[58px] py-1 flex justify-start group -mt-[2px]">
                    <div
                        class="h-[50.25px] p-3 flex group-hover:bg-[rgba(231,233,234,0.1)] transition-all rounded-full cursor-pointer">
                        <svg viewBox="0 0 24 24" aria-hidden="true" class="svg">
                            <g>
                                <path
                                    d="M21.591 7.146L12.52 1.157c-.316-.21-.724-.21-1.04 0l-9.071 5.99c-.26.173-.409.456-.409.757v13.183c0 .502.418.913.929.913h6.638c.511 0 .929-.41.929-.913v-7.075h3.008v7.075c0 .502.418.913.929.913h6.639c.51 0 .928-.41.928-.913V7.904c0-.301-.158-.584-.408-.758zM20 20l-4.5.01.011-7.097c0-.502-.418-.913-.928-.913H9.44c-.511 0-.929.41-.929.913L8.5 20H4V8.773l8.011-5.342L20 8.764z"
                                    fill="#fff"></path>
                            </g>
                        </svg>
                        <div class="pr-4 pl-5 text-xl leading-6"><a href="./index.php">Główna</a></div>
                    </div>
                </li>
                <li class="w-64 h-14 flex justify-start group ">
                    <div
                        class="h-[50.25px] p-3 flex group-hover:bg-[rgba(231,233,234,0.1)] transition-all rounded-full cursor-pointer">
                        <svg viewBox="0 0 24 24" aria-hidden="true" class="svg">
                            <g>
                                <path
                                    d="M10.25 3.75c-3.59 0-6.5 2.91-6.5 6.5s2.91 6.5 6.5 6.5c1.795 0 3.419-.726 4.596-1.904 1.178-1.177 1.904-2.801 1.904-4.596 0-3.59-2.91-6.5-6.5-6.5zm-8.5 6.5c0-4.694 3.806-8.5 8.5-8.5s8.5 3.806 8.5 8.5c0 1.986-.682 3.815-1.824 5.262l4.781 4.781-1.414 1.414-4.781-4.781c-1.447 1.142-3.276 1.824-5.262 1.824-4.694 0-8.5-3.806-8.5-8.5z"
                                    fill="#fff"></path>
                            </g>
                        </svg>
                        <div class="pr-4 pl-5 text-xl leading-6">Przeglądaj</div>
                    </div>
                </li>
                <li class="w-64 h-14 flex justify-start group -mt-[2px]">
                    <div
                        class="h-[50.25px] p-3 flex group-hover:bg-[rgba(231,233,234,0.1)] transition-all rounded-full cursor-pointer">
                        <svg viewBox="0 0 24 24" aria-hidden="true" class="svg">
                            <g>
                                <path
                                    d="M19.993 9.042C19.48 5.017 16.054 2 11.996 2s-7.49 3.021-7.999 7.051L2.866 18H7.1c.463 2.282 2.481 4 4.9 4s4.437-1.718 4.9-4h4.236l-1.143-8.958zM12 20c-1.306 0-2.417-.835-2.829-2h5.658c-.412 1.165-1.523 2-2.829 2zm-6.866-4l.847-6.698C6.364 6.272 8.941 4 11.996 4s5.627 2.268 6.013 5.295L18.864 16H5.134z"
                                    fill="#fff"></path>
                            </g>
                        </svg>
                        <div class="pr-4 pl-5 text-xl leading-6"><a href="./lol.html">Powiadomienia</a></div>
                    </div>
                </li>
                <li class="w-64 h-14 flex justify-start group -mt-[2px]">
                    <div
                        class="h-[50.25px] p-3 flex group-hover:bg-[rgba(231,233,234,0.1)] transition-all rounded-full cursor-pointer">
                        <svg viewBox="0 0 24 24" aria-hidden="true" class="svg">
                            <g>
                                <path
                                    d="M1.998 5.5c0-1.381 1.119-2.5 2.5-2.5h15c1.381 0 2.5 1.119 2.5 2.5v13c0 1.381-1.119 2.5-2.5 2.5h-15c-1.381 0-2.5-1.119-2.5-2.5v-13zm2.5-.5c-.276 0-.5.224-.5.5v2.764l8 3.638 8-3.636V5.5c0-.276-.224-.5-.5-.5h-15zm15.5 5.463l-8 3.636-8-3.638V18.5c0 .276.224.5.5.5h15c.276 0 .5-.224.5-.5v-8.037z"
                                    fill="#fff"></path>
                            </g>
                        </svg>
                        <div class="pr-4 pl-5 text-xl leading-6"><a href="./lol.html">Wiadomości</a></div>
                    </div>
                </li>
                <li class="w-64 h-14 flex justify-start group -mt-[2px]">
                    <div
                        class="h-[50.25px] p-3 flex group-hover:bg-[rgba(231,233,234,0.1)] transition-all rounded-full cursor-pointer">
                        <svg viewBox="0 0 24 24" aria-hidden="true" class="svg">
                            <g>
                                <path
                                    d="M3 4.5C3 3.12 4.12 2 5.5 2h13C19.88 2 21 3.12 21 4.5v15c0 1.38-1.12 2.5-2.5 2.5h-13C4.12 22 3 20.88 3 19.5v-15zM5.5 4c-.28 0-.5.22-.5.5v15c0 .28.22.5.5.5h13c.28 0 .5-.22.5-.5v-15c0-.28-.22-.5-.5-.5h-13zM16 10H8V8h8v2zm-8 2h8v2H8v-2z"
                                    fill="#fff"></path>
                            </g>
                        </svg>
                        <div class="pr-4 pl-5 text-xl leading-6"><a href="./lol.html">Listy</a></div>
                    </div>
                </li>
                <li class="w-64 h-14 flex justify-start group -mt-[2px]">
                    <div
                        class="h-[50.25px] p-3 flex group-hover:bg-[rgba(231,233,234,0.1)] transition-all rounded-full cursor-pointer">
                        <svg viewBox="0 0 24 24" aria-hidden="true" class="svg">
                            <g>
                                <path
                                    d="M4 4.5C4 3.12 5.119 2 6.5 2h11C18.881 2 20 3.12 20 4.5v18.44l-8-5.71-8 5.71V4.5zM6.5 4c-.276 0-.5.22-.5.5v14.56l6-4.29 6 4.29V4.5c0-.28-.224-.5-.5-.5h-11z"
                                    fill="#fff"></path>
                            </g>
                        </svg>
                        <div class="pr-4 pl-5 text-xl leading-6"><a href="./lol.html">Zakładki</a></div>
                    </div>
                </li>
                <li class="w-64 h-14 flex justify-start group -mt-[2px]">
                    <div
                        class="h-[50.25px] p-3 flex group-hover:bg-[rgba(231,233,234,0.1)] transition-all rounded-full cursor-pointer">
                        <svg viewBox="0 0 24 24" aria-hidden="true" class="svg">
                            <g>
                                <path
                                    d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"
                                    fill="#fff"></path>
                            </g>
                        </svg>
                        <div class="pr-4 pl-5 text-xl leading-6"><a href="./lol.html">Premium</a></div>
                    </div>
                </li>
                <li class="hide w-64 h-14 flex justify-start group -mt-[2px]">
                    <div
                        class="h-[50.25px] p-3 flex group-hover:bg-[rgba(231,233,234,0.1)] transition-all rounded-full cursor-pointer">
                        <svg viewBox="0 0 24 24" aria-hidden="true" class="svg">
                            <g>
                                <path
                                    d="M5.651 19h12.698c-.337-1.8-1.023-3.21-1.945-4.19C15.318 13.65 13.838 13 12 13s-3.317.65-4.404 1.81c-.922.98-1.608 2.39-1.945 4.19zm.486-5.56C7.627 11.85 9.648 11 12 11s4.373.85 5.863 2.44c1.477 1.58 2.366 3.8 2.632 6.46l.11 1.1H3.395l.11-1.1c.266-2.66 1.155-4.88 2.632-6.46zM12 4c-1.105 0-2 .9-2 2s.895 2 2 2 2-.9 2-2-.895-2-2-2zM8 6c0-2.21 1.791-4 4-4s4 1.79 4 4-1.791 4-4 4-4-1.79-4-4z"
                                    fill="#fff"></path>
                            </g>
                        </svg>
                        <div class="pr-4 pl-5 text-xl leading-6"><a href="./profil.php">Profil</a></div>
                    </div>
                </li>
                <li class="w-64 h-14 flex justify-start group -mt-[2px]">
                    <div
                        class="h-[50.25px] p-3 flex group-hover:bg-[rgba(231,233,234,0.1)] transition-all rounded-full cursor-pointer">
                        <svg viewBox="0 0 24 24" aria-hidden="true" class="svg">
                            <g>
                                <path
                                    d="M3.75 12c0-4.56 3.69-8.25 8.25-8.25s8.25 3.69 8.25 8.25-3.69 8.25-8.25 8.25S3.75 16.56 3.75 12zM12 1.75C6.34 1.75 1.75 6.34 1.75 12S6.34 22.25 12 22.25 22.25 17.66 22.25 12 17.66 1.75 12 1.75zm-4.75 11.5c.69 0 1.25-.56 1.25-1.25s-.56-1.25-1.25-1.25S6 11.31 6 12s.56 1.25 1.25 1.25zm9.5 0c.69 0 1.25-.56 1.25-1.25s-.56-1.25-1.25-1.25-1.25.56-1.25 1.25.56 1.25 1.25 1.25zM13.25 12c0 .69-.56 1.25-1.25 1.25s-1.25-.56-1.25-1.25.56-1.25 1.25-1.25 1.25.56 1.25 1.25z"
                                    fill="#fff"></path>
                            </g>
                        </svg>
                        <div class="pr-4 pl-5 text-xl leading-6"><a href="./lol.html">Więcej</a></div>
                    </div>
                </li>
                <li class="hide flex justify-start">
                    <button onclick="addTweetModal.showModal()"
                        class="text-center bg-[#1D9BF0] w-[233px] mt-[10px] font-bold px-8 h-[52px] button-left-nav rounded-full cursor-pointer hover:opacity-80 transition-opacity">
                        Opublikuj Wpis
                    </button>
                </li>
                <div class="dropdown dropdown-top h-screen w-full">
                    <div class="relative">
                        <div class="absolute">
                            <li role="button" tabindex="0"
                                class="flex items-center w-[150%] my-3 p-3 h-16 hover:bg-[rgba(231,233,234,0.1)] transition-all rounded-full cursor-pointer button-left-nav">
                                <div class="flex w-full hide">
                                    <?php
                                    require_once ('../php/Classes/db_connect.php');
                                    require_once ('../php/Classes/QueryBuilder.php');
                                    require_once ('../php/Classes/DataInsert.php');
                                    $conn = connectToDatabase();

                                    if (isset($_SESSION["id"]) && isset($_SESSION["username"])) {
                                        $username = $_SESSION['username'];
                                        $id = $_SESSION['id'];

                                        $queryBuilder = new SQLQueryBuilder('users', $conn);

                                        $queryBuilder->addCondition('id', $id);

                                        $userData = $queryBuilder->executeQuery();

                                        if (!empty($userData)) {
                                            foreach ($userData as $row) {
                                                $userUsername = $row['username'];
                                                $userDisplayName = $row['display_name'];
                                                $userAvatar = $row['avatar'];
                                            }
                                        }

                                        if (empty($userAvatar)) {
                                            $userAvatar = "../asset/img/blank.png";
                                        } else {
                                            $userAvatar = "../php/uploads/" . $userAvatar;
                                        }
                                    }

                                    ?>
                                    <img src=<?php echo $userAvatar ?> class="w-11 h-11 rounded-full hide" alt="">
                                    <div class="flex flex-col text-[15px] w-[74px] h-[41px] justify-start px-2 hide">
                                        <span>
                                            <?php echo $userDisplayName ?>
                                        </span>
                                        <span class="text-[#71767B]">
                                            <?php echo $userUsername; ?>
                                        </span>
                                    </div>
                                    <div class="flex items-center w-full justify-end">
                                        <svg viewBox="0 0 24 24" aria-hidden="true" class="svg">
                                            <g>
                                                <path
                                                    d="M3 12c0-1.1.9-2 2-2s2 .9 2 2-.9 2-2 2-2-.9-2-2zm9 2c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm7 0c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"
                                                    fill="#fff"></path>
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                            </li>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <ul
                            class="dropdown-content z-[1] menu p-2 shadow bg-black dropdown-shadow rounded-box w-[110%]">
                            <li><a href="../php/actions/logout.php" class="px-4 py-3">Wyloguj się z konta
                                    <?php echo $userUsername; ?>
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </ul>
    </div>
    <dialog id="addTweetModal" class="modal min-h-[220px]">
        <div class="modal-box flex flex-col bg-black border border-white w-full">
            <form action="../php/actions/AddPost.php" method="POST" enctype="multipart/form-data">
                <div class="flex flex-col">
                    <img src=<?php echo $userAvatar ?> class="w-11 rounded-full mr-3" alt="">
                    <input type="text" placeholder="Tytuł" name="title" class="mt-3 w-full bg-black outline-none h-auto"
                        required>
                    <textarea name="desc" placeholder="Co się dzieje?!"
                        class="min-h-24 h-24 resize-none mt-3 w-full bg-black outline-none" required
                        oninput="autoResizeTextarea(this)"></textarea>
                    <input type="file" name="avatar" id="avatar" accept="image/*"
                        class="mx-auto mt-3 file-input file-input-bordered w-full max-w-xs" />
                    <p class="text-center text-xs my-2">zdjęcie opcjonale</p>
                    <?php
                    if ($_SESSION['isAdult']) {
                        echo "
                                <div class='form-control container'>
                                    <label class='label cursor-pointer'>
                                        <span class='label-text'>Czy treść jest dla dorosłych</span> 
                                        <input type='checkbox' class='checkbox' name='forAdult'/>
                                    </label>
                                </div>";

                    }
                    ?>
                </div>
                <hr class="mt-1">
                <div class="justify-between items-center w-full flex">
                    <div>
                        <input type="text" placeholder="#php" name="tag" class="h-[36px] p-2 rounded-xl mt-[10px]">
                    </div>
                    <div>
                        <button
                            class="text-center bg-[#1D9BF0] mt-[10px] font-bold px-8 h-[36px] button-left-nav rounded-full cursor-pointer hover:opacity-80 transition-opacity">Opublikuj</button>
                    </div>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

    <div class="flex flex-col">
        <form action="../php/actions/search.php" method="POST" class="mb-2 md:hidden">
            <div class="w-[350px] h-11 bg-[#16181c] mb-[18px] mt-[6px] rounded-full flex items-center mx-auto">
                <div class="h-11">
                    <svg viewBox="0 0 24 24" aria-hidden="true" class="w-11 h-[19px] mt-[27%]">
                        <g>
                            <path fill="#ffff"
                                d="M10.25 3.75c-3.59 0-6.5 2.91-6.5 6.5s2.91 6.5 6.5 6.5c1.795 0 3.419-.726 4.596-1.904 1.178-1.177 1.904-2.801 1.904-4.596 0-3.59-2.91-6.5-6.5-6.5zm-8.5 6.5c0-4.694 3.806-8.5 8.5-8.5s8.5 3.806 8.5 8.5c0 1.986-.682 3.815-1.824 5.262l4.781 4.781-1.414 1.414-4.781-4.781c-1.447 1.142-3.276 1.824-5.262 1.824-4.694 0-8.5-3.806-8.5-8.5z">
                            </path>
                        </g>
                    </svg>
                </div>
                <input class="text-[15px] bg-[#16181c] outline-none w-full mr-3" placeholder="Szukaj"
                    name="search"></input>
            </div>
        </form>
        <div class="w-full min-h-20 px-0 md:w-[600px] md:px-[16px] hide post hidden md:block">
            <form action="../php/actions/AddPost.php" method="POST" enctype="multipart/form-data">
                <div class="flex mt-3">
                    <img src=<?php echo $userAvatar ?> class="w-11 h-11 mt-2 rounded-full" alt="">
                    <div class="ml-3 flex flex-col w-full">
                        <div>
                            <input type="text" placeholder="Tytuł" name="title"
                                class="mt-3 w-full bg-black outline-none h-auto" required>
                            <textarea name="desc" placeholder="Co się dzieje?!"
                                class=" mt-3 w-full bg-black outline-none min-h-[48px] max-h-96 mb-3" required
                                oninput="autoResizeTextarea(this)"></textarea>
                            <div class="flex flex-col justify-center">
                                <input type="file" name="avatar" id="avatar" accept="image/*"
                                    class="mx-auto mt-3 file-input file-input-bordered w-full max-w-xs" />
                                <p class="text-center text-xs my-2">zdjęcie opcjonale</p>
                            </div>
                            <?php
                            if ($_SESSION['isAdult']) {
                                echo "
                                        <div class='form-control container'>
                                            <label class='label cursor-pointer'>
                                                <span class='label-text'>Czy treść jest dla dorosłych</span> 
                                                <input type='checkbox' class='checkbox' name='forAdult'/>
                                            </label>
                                        </div>
                                    ";
                            }
                            ?>
                        </div>
                        <div class="justify-between items-center w-full flex mb-2">
                            <div>
                                <input type="text" placeholder="#php" name="tag" class="h-[36px] p-2 rounded-xl">
                            </div>
                            <div>
                                <button
                                    class="text-center bg-[#1D9BF0]  font-bold px-8 h-[36px] button-left-nav rounded-full cursor-pointer hover:opacity-80 transition-opacity"
                                    type="submit">Opublikuj
                                    Wpis</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <?php

        $itemsPerPage = 5;
        $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $offset = ($currentPage - 1) * $itemsPerPage;


        $queryBuilder = new SQLQueryBuilder('posts', $conn);
        $queryBuilder->orderBy('created_at', 'DESC');

        // if (isset($_GET['search']) && !empty($_GET['search'])) {
        //     $queryBuilder->addCondition('isForAdult', 0);
        // }
        
        // if ($_SESSION['isAdult'] == 0 ) {
        //     $queryBuilder->addCondition('isForAdult', 0);
        // }
        
        if (isset($_SESSION['isAdult']) && $_SESSION['isAdult'] == 0) {
            $queryBuilder->addCondition('isForAdult', 0);
        }

        if (isset($_GET['tag'])) {
            $tagURL = $_GET['tag'];
            if ($tagURL) {
                $queryBuilder->addCondition('tag', $tagURL);
            }
        }
        if (isset($_GET['search'])) {
            $searchURL = $_GET['search'];
            $queryBuilder->addCondition('description', "%$searchURL%", "LIKE", "OR");
            $queryBuilder->addCondition('tag', "%$searchURL%", "LIKE", "OR");
            $queryBuilder->addCondition('title', "%$searchURL%", "LIKE", "OR");
        }


        $queryBuilder->limit($itemsPerPage, $offset);

        $data = $queryBuilder->executeQuery();

        if (!empty($data)) {
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

            foreach ($data as $row) {
                $postId = $row['id'];
                $title = $row['title'];
                $desc = str_replace('\r\n', '<br>', $row['description']);
                $tag = $row['tag'];
                $postImg = $row['img'];
                $createdAt = $row['created_at'];
                $userId = $row['user_id'];
                $img = $row['img'];
                $isForAdult = $row['isForAdult'];


                $queryBuilder = new SQLQueryBuilder("users", $conn);
                $queryBuilder->addCondition('id', $userId);
                $data = $queryBuilder->executeQuery();

                if (!empty($data)) {
                    foreach ($data as $row) {
                        $username = $row['username'];
                        $displayName = $row['display_name'];
                        $avatar = $row['avatar'];
                    }

                    if (empty($avatar)) {
                        $avatar = "../asset/img/blank.png";
                    } else {
                        $avatar = "../php/uploads/" . $avatar;
                    }

                    $createdAt = new DateTime($createdAt);
                    $now = new DateTime();

                    $interval = $createdAt->diff($now);

                    if ($interval->y > 0) {
                        $createdAt = $interval->format('%yl.');
                    } elseif ($interval->m > 0) {
                        $createdAt = $interval->format('%mm.');
                    } elseif ($interval->d > 0) {
                        $createdAt = $interval->format('%dd.');
                    } elseif ($interval->h > 0) {
                        $createdAt = $interval->format('%hg.');
                    } elseif ($interval->i > 0) {
                        $createdAt = $interval->format('%im.');
                    } else {
                        $createdAt = 'Teraz';
                    }

                    if (!function_exists('checkIfTag')) {
                        function checkIfTag($value, $isLink)
                        {
                            if (!empty($value)) {
                                if (!$isLink) {
                                    return "#$value";
                                }
                                return $value;
                            } else {
                                return false;
                            }
                        }
                    }

                    if ($isForAdult) {
                        $isForAdult = "18+";
                    } else {
                        $isForAdult = "Kids";
                    }

                    echo '
                        <div class="w-full min-h-20 px-0 md:w-[600px] md:min-h-[78px] md:px-[16px] post">
                        <div class="flex mt-3 ml-2 md:ml-0">
                            <a href="./profil.php?u=' . $username . '" class="cursor-pointer">
                            <img src=' . $avatar . '
                                class="w-11 h-11 rounded-full" alt="">
                            </a>
                            <div class="ml-3 flex flex-col">
                                <div>
                                    <span class=""><a href="./profil.php?u=' . $username . '" class="cursor-pointer">' . $displayName . '</a></span>
                                    <span class="ml-1">·</span>
                                    <span class=""><a href="./profil.php?u=' . $username . '" class="cursor-pointer">' . $username . '</a></span>
                                    <span class="ml-1">·</span>
                                    <span class="ml-1">' . $createdAt . '</span>
                                    <span class="ml-1">·</span>
                                    <span class="ml-1">' . $isForAdult . '</span>
                                </div>
                                <h1 class="font-bold cursor-pointer" onClick="moveToComments(' . $postId . ')">' . $title . '</h1>
                                <div class="w-80 md:w-[500px] line-clamp-4 cursor-pointer" onClick="moveToComments(' . $postId . ')">' . $desc . '</div>
                                <span class="mt-[22px] mb-[15px] text-blue-400 cursor-pointer"><a href="?tag=' . checkIfTag($tag, true) . '">' . checkIfTag($tag, false) . '</a></span>
                                ';

                    if (!empty($img)) {
                        $img = "../php/uploads/" . $img;
                        echo "<img class='scale-img cursor-pointer mb-2' src='$img' onClick='moveToComments($postId)'>";
                    }
                    if (isset($_SESSION["id"]) && isset($_SESSION["username"])) {

                        if (($_SESSION['isAdmin'] && isset($_GET['admin']) && $_GET['admin'] === "true") || $_SESSION['id'] == $userId) {
                            echo "<a onClick='editPost" . $postId . ".showModal()' class='px-4 py-2 bg-blue-500 rounded-full my-3 w-1/2 mx-auto hover:opacity-80 transition-all text-center font-bold cursor-pointer'>Edytuj Post</a>";
                        echo "<a href='../php/actions/deletePost.php?id=$postId&author=$userId' class='px-4 py-2 bg-red-500 rounded-full my-3 w-1/2 mx-auto hover:opacity-80 transition-all text-center font-bold cursor-pointer'>Usuń Post</a>";
                        echo '
                        <dialog id="editPost' . $postId . '" class="modal">
                        <div class="modal-box bg-black border border-white w-full md:w-[600px]">
                        <form action="../php/actions/changePost.php" method="POST" enctype="multipart/form-data">
                        <div class="flex flex-col justify-center px-20">
                        <h1 class="text-3xl mb-[33px] font-bold">Edytuj Post</h1>
                        <input type="text" name="title" required placeholder="Tytuł" class="h-[52px] rounded-md bg-black border border-[#333639] focus:border-2 focus:border-[#179BF0] outline-none px-2" value="' . $title . '">
                                    <textarea name="desc" placeholder="Opis"
                                        class="min-h-24 h-24 resize-none mt-3 w-full bg-black border border-[#333639] outline-none rounded-md overflow-hidden p-3" required
                                        oninput="autoResizeTextarea(this)">' . $desc . '</textarea>
                                        <input type="text" name="tag" placeholder="Tag" class="h-[52px] rounded-md bg-black border border-[#333639] focus:border-2 focus:border-[#179BF0] outline-none px-2 mt-2" value="' . $tag . '">
                                    <input type="file" name="img" accept="image/*" class="mt-[27px] file-input file-input-bordered w-full max-w-xs" />
                                    <input type="hidden" name="postId" value="' . $postId . '" />
                                    <input type="hidden" name="author" value="' . $userId . '" />
                                    <button class="mt-[200px] h-[52px] bg-[#eff3f4] hover:opacity-80 transition-all text-center text-black font-bold rounded-full">Zapisz Zamiany</button>
                                    </div>
                                    </form>
                        </div>
                        <form method="dialog" class="modal-backdrop">
                        <button>close</button>
                        </form>
                        </dialog>';
                        
                    }
                    }

                    echo '</div>
                            </div>
                        </div>';
                }
            }
        }


        $queryBuilder = new SQLQueryBuilder('posts', $conn);
        if (isset($_GET['tag'])) {
            if ($_GET['tag']) {
                $tagURL = $_GET['tag'];
                $condition = "tag = '$tagURL'";
                $count = $queryBuilder->count($condition);
            }
        }
        if (isset($_GET['search'])) {
            if ($_GET['search']) {
                $searchURL = $_GET['search'];
                $condition = "description LIKE '%$searchURL%' OR tag LIKE '%$searchURL%' OR title LIKE '%$searchURL%'";
                $count = $queryBuilder->count($condition);
            }
        }
        if (!isset($_GET['tag']) && !isset($_GET['search'])) {
            $count = $queryBuilder->count();
        }

        if (isset($_GET['page'])) {
            // $maxPages = round($count / 5) * 5 / 5;
            $maxPages = ceil($count / 5);
            if ($_GET['page'] > $maxPages) {
                echo "<p class='text-center mt-4'>Czego tu szukasz?</p>";
            }
        }

        // $conn->close();
        ?>

        <!-- Pagination -->
        <div class="flex flex-col justify-center my-3 mx-auto">
            <div class="join">
                <button class="join-item btn" onclick="decrementPage()">«</button>
                <a href="index.php">
                    <button class="join-item btn">Strona
                        <?php echo $currentPage ?>
                    </button>
                </a>
                <button class="join-item btn" onclick="incrementPage(<?php echo $count ?>)">»</button>
            </div>
            <?php
            if (isset($_GET['tag'])) {
                if ($_GET['tag']) {
                    echo '<button class="btn justify-center mt-4" onclick="clearTag()">Wyczyść tag</button>';
                }
            }
            ?>
        </div>

    </div>
    <div class="md:flex flex-col hidden ml-[30px]">
        <form action="../php/actions/search.php" method="POST">
            <div class="w-[350px] h-11 bg-[#16181c] mb-[18px] mt-[6px] rounded-full flex items-center">
                <div class="h-11">
                    <svg viewBox="0 0 24 24" aria-hidden="true" class="w-11 h-[19px] mt-[27%]">
                        <g>
                            <path fill="#ffff"
                                d="M10.25 3.75c-3.59 0-6.5 2.91-6.5 6.5s2.91 6.5 6.5 6.5c1.795 0 3.419-.726 4.596-1.904 1.178-1.177 1.904-2.801 1.904-4.596 0-3.59-2.91-6.5-6.5-6.5zm-8.5 6.5c0-4.694 3.806-8.5 8.5-8.5s8.5 3.806 8.5 8.5c0 1.986-.682 3.815-1.824 5.262l4.781 4.781-1.414 1.414-4.781-4.781c-1.447 1.142-3.276 1.824-5.262 1.824-4.694 0-8.5-3.806-8.5-8.5z">
                            </path>
                        </g>
                    </svg>
                </div>
                <input class="text-[15px] bg-[#16181c] outline-none w-full mr-3" placeholder="Szukaj"
                    name="search"></input>
            </div>
        </form>
        <aside class="w-[350px] bg-[#16181c] rounded-xl mt-4">
            <div class="flex flex-col gap-1">
                <h2 class="text-[20px] font-bold px-4 py-3">Najpopularniejsze Tagi</h2>
                <?php
                require_once ('../php/Classes/CountTop.php');
                $topElements = getTopElementsWithHighestCount($conn, 'posts', 'tag');

                foreach ($topElements as $row) {
                    $tag = $row['tag'];
                    $count = $row['count'];

                    echo "
                        <div>
                            <a href='index.php?tag=$tag'>
                                <div class='w-full h-[86px] px-4 hover:opacity-80 transition-all'>
                                    <p class='text-[15px] font-bold pt-[15px] text-[#e7e9ea]'>$tag</p>
                                    <p class='mt-[5px] text-[13px] text-[#71767b]'>$count postów</p>
                                </div>
                            </a>
                        </div>
                        ";
                }

                $conn->close();
                ?>
        </aside>
    </div>

    <div class="btm-nav md:hidden">
        <a href="index.php" class="active">
            <svg viewBox="0 0 24 24" aria-hidden="true" class="h-5 w-5">
                <g>
                    <path
                        d="M21.591 7.146L12.52 1.157c-.316-.21-.724-.21-1.04 0l-9.071 5.99c-.26.173-.409.456-.409.757v13.183c0 .502.418.913.929.913h6.638c.511 0 .929-.41.929-.913v-7.075h3.008v7.075c0 .502.418.913.929.913h6.639c.51 0 .928-.41.928-.913V7.904c0-.301-.158-.584-.408-.758zM20 20l-4.5.01.011-7.097c0-.502-.418-.913-.928-.913H9.44c-.511 0-.929.41-.929.913L8.5 20H4V8.773l8.011-5.342L20 8.764z"
                        fill="#fff">
                    </path>
                </g>
            </svg>
        </a>
        <a href="profil.php">
            <svg viewBox="0 0 24 24" aria-hidden="true" class="h-5 w-5">
                <g>
                    <path
                        d="M5.651 19h12.698c-.337-1.8-1.023-3.21-1.945-4.19C15.318 13.65 13.838 13 12 13s-3.317.65-4.404 1.81c-.922.98-1.608 2.39-1.945 4.19zm.486-5.56C7.627 11.85 9.648 11 12 11s4.373.85 5.863 2.44c1.477 1.58 2.366 3.8 2.632 6.46l.11 1.1H3.395l.11-1.1c.266-2.66 1.155-4.88 2.632-6.46zM12 4c-1.105 0-2 .9-2 2s.895 2 2 2 2-.9 2-2-.895-2-2-2zM8 6c0-2.21 1.791-4 4-4s4 1.79 4 4-1.791 4-4 4-4-1.79-4-4z"
                        fill="#fff"></path>
                </g>
            </svg>
        </a>
        <button onclick="addTweetModal.showModal()"
            class="text-center bg-[#1D9BF0] font-bold px-8 h-[52px] button-left-nav rounded-full cursor-pointer hover:opacity-80 transition-opacity">
            Dodaj
        </button>
        <?php
        if ($_SESSION['isAdmin'] == true) {
            echo '
            <button>
                <label class="swap">
                    <input type="checkbox" onchange="adminModeCheckbox(this)" id="bottomAdminMode"';
            if (isset($_GET['admin']) && $_GET['admin'] == "true" && isset($_GET['admin'])) {
                echo "checked";
            }
            echo '/>
                    <div class="swap-on">ON</div>
                    <div class="swap-off">OFF</div>
                </label>
            </button>
            ';
        }
        ?>
    </div>
    <script>
        hideElements();
    </script>
    <script src='./script.js'></script>
</body>

</html>