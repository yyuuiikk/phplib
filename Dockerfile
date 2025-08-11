FROM php:8.4-cli

# 必要なシステムパッケージをインストール
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libonig-dev \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# PHP拡張機能をインストール
RUN docker-php-ext-install \
    zip \
    ftp \
    mbstring

# 作業ディレクトリを設定
WORKDIR /var/www/html

# PHPファイルをコンテナにコピー
COPY . .

# bashを永続的に実行するためのコマンド
CMD ["bash", "-c", "while true; do sleep 30; done"]