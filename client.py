import webbrowser, pyautogui
from time import sleep


def main():
    n = 0
    try:
        n = int(input("Здравствуйте! Это программа для показа веб-страниц\n"
                      "Пожалуйста, введите количество адресов, которое вам надо показать: "))
    except ValueError:
        print("Кажется, вы ввели не целое число, перезапустите программу и попробуйте ещё раз")
        exit()

    addresses = []
    timeouts = []

    for i in range(n):
        try:
            address, interval = input("Введите адрес и интервал для его показа через пробел: ").split()
            if "https://" not in address:
                address = "https://" + address
            addresses.append(address)
            timeouts.append(int(interval))
        except Exception:
            print("Кажется, вы ввели что-то не то, перезапустите программу и попробуйте ещё раз")
            exit()

    try:
        while True:
            for i in range(n):
                webbrowser.open(addresses[i])
                sleep(timeouts[i])
                pyautogui.hotkey('command', 'w')
    except KeyboardInterrupt:
        print("Программа завершена")


if __name__ == "__main__":
    main()
