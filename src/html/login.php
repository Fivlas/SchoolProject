<!DOCTYPE html>
<html lang="pl" class='dark'>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / X</title>
    <link rel="mask-icon" sizes="any" href="https://abs.twimg.com/responsive-web/client-web/icon-svg.ea5ff4aa.svg"
        color="#1D9BF0">
    <link rel="shortcut icon" href="https://abs.twimg.com/favicons/twitter.3.ico">
    <link rel="apple-touch-icon" sizes="192x192"
        href="https://abs.twimg.com/responsive-web/client-web/icon-ios.77d25eba.png" />
    <!-- <link href="/dist/output.css" rel="stylesheet"> -->
    <link href="../../dist/output.css" rel="stylesheet">
</head>

<body class="bg-black font-['TwitterChirp']">
    <div class="w-screen h-screen">
        <div class="flex w-screen h-screen">
            <div class="h-screen w-1/2 hidden md:block">
                <div class="flex justify-center items-center h-full">
                    <svg viewBox="0 0 24 24" aria-hidden="true" class="max-h-[380px]">
                        <g>
                            <path
                                d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"
                                fill="#fff"></path>
                        </g>
                    </svg>
                </div>
            </div>
            <div class="h-screen md:w-1/2 flex flex-col ml-4 md:-ml-10 justify-center items-center">
                <div>
                    <svg viewBox="0 0 24 24" aria-hidden="true" class="max-h-[57px] mb-[68px] md:hidden">
                        <g>
                            <path
                                d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"
                                fill="#fff"></path>
                        </g>
                    </svg>
                    <h1 class="text-4xl md:text-7xl font-['TwitterChirpExtendedHeavy']">Najświeższe wieści<br>ze świata</h1>
                    <h2 class="font-['TwitterChirpExtendedHeavy'] mt-[51px] mb-[32px] text-3xl">Dołącz już dziś</h4>
                        <button
                            class="bg-[#1d9bf0] text-[15px] w-[300px] h-10 px-4 rounded-full text-white font-bold hover:opacity-80 transition-all" onclick="registerModal.showModal()">Utwórz konto</button>
                        <div class="text-[11px] mt-[9px]"
                            style="color: rgb(113, 118, 123); width: 300px; text-overflow: unset;">Rejestrując
                            się, zgadzasz się na
                            <a href="https://twitter.com/tos" rel="noopener noreferrer nofollow" target="_blank"
                                role="link" style="color: rgb(29, 155, 240); text-overflow: unset;">
                                <span style="text-overflow: unset;">
                                    Warunki korzystania
                                </span>
                            </a>
                            i
                            <a href="https://twitter.com/privacy" rel="noopener noreferrer nofollow" target="_blank"
                                role="link" style="color: rgb(29, 155, 240); text-overflow: unset;">
                                <span style="text-overflow: unset;">Politykę prywatności</span></a>, łącznie z <a
                                href="https://help.twitter.com/rules-and-policies/twitter-cookies"
                                rel="noopener noreferrer nofollow" target="_blank" role="link"
                                style="color: rgb(29, 155, 240); text-overflow: unset;"><span
                                    style="text-overflow: unset;">
                                    Polityką ciasteczek
                                </span>
                            </a>
                        </div>
                        <h3 class="mt-[60px] text-[17px] font-bold">Masz już konto?</h3>
                        <button
                            class="mt-5 text-[#1d9bf0] text-[15px] w-[300px] h-10 px-4 rounded-full border border-[#546471] font-bold hover:opacity-80 button-login-hover transition-all" onclick="loginModal.showModal()">Zaloguj się</button>
                </div>
            </div>
        </div>
    </div>


    <dialog id="loginModal" class="modal">
        <div class="modal-box bg-black border border-white w-full md:w-[600px]">
            <form action="../php/actions/login.php" method="POST">
                <div class="flex flex-col justify-center px-20">
                    <svg viewBox="0 0 24 24" aria-hidden="true" class="max-h-[26px] mb-[33px]">
                        <g>
                            <path
                                d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"
                                fill="#fff"></path>
                        </g>
                    </svg>
                        <h1 class="text-3xl mb-[33px] font-bold">Zaloguj się</h1>
                        <input type="text" name="login" placeholder="Nazwa użytkownika" class="h-[52px] rounded-md bg-black border border-[#333639] focus:border-2 focus:border-[#179BF0] outline-none px-2">
                        <input type="password" name="password" placeholder="Hasło" class="h-[52px] rounded-md bg-black border border-[#333639] focus:border-2 focus:border-[#179BF0] outline-none px-2 mt-[27px]">
                        <?php
                        if (isset($_GET['error'])) {
                            echo '<span class="text-red-500 text-center mt-2">'.$_GET['error'].'</span>';
                        }
                        ?>
                        <button class="mt-[200px] h-[52px] bg-[#eff3f4] hover:opacity-80 transition-all text-center text-black font-bold rounded-full">Zaloguj się</button>
                    </div>
                </div>
            </form>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

    <dialog id="registerModal" class="modal">
        <div class="modal-box bg-black border border-white w-full md:w-[600px]">
            <form action="../php/actions/register.php" method="POST" enctype="multipart/form-data">
                <div class="flex flex-col justify-center px-20">
                    <svg viewBox="0 0 24 24" aria-hidden="true" class="max-h-[26px] mb-[33px]">
                        <g>
                            <path
                                d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"
                                fill="#fff"></path>
                        </g>
                    </svg>
                    <h1 class="text-3xl mb-[33px] font-bold">Utwórz konto</h1>
                    <input type="text" name="username" placeholder="Nazwa użytkownika" class="h-[52px] rounded-md bg-black border border-[#333639] focus:border-2 focus:border-[#179BF0] outline-none px-2">
                    <input type="password" name="password" placeholder="Hasło" class="h-[52px] rounded-md bg-black border border-[#333639] focus:border-2 focus:border-[#179BF0] outline-none px-2 mt-[27px]">
                    <input type="password" name="passwordAgain" placeholder="Powtórz hasło" class="h-[52px] rounded-md bg-black border border-[#333639] focus:border-2 focus:border-[#179BF0] outline-none px-2 mt-[27px]">
                    <div class="form-control my-2">
                        <label class="label cursor-pointer">
                            <span class="label-text">Czy jesteś pełnoletni ?</span> 
                            <input type="checkbox" class="checkbox" name="isAdult" />
                        </label>
                    </div>
                    <input type="file" name="avatar" id="avatar" accept="image/*" class="file-input file-input-bordered w-full max-w-xs" />
                    <p class="text-center text-xs mt-2">Avatar Opcjonalny</p>
                    <?php
                        if (isset($_GET['registerError'])) {
                            echo '<span class="text-red-500 text-center mt-2">'.$_GET['registerError'].'</span>';
                        }
                        ?>
                    <button class="mt-[90px] h-[52px] bg-[#eff3f4] hover:opacity-80 transition-all text-center text-black font-bold rounded-full">Utwórz konto</button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
</body>

</html>