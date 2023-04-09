FROM mcr.microsoft.com/vscode/devcontainers/base:ubuntu-22.04
USER vscode
ARG HOME=/home/vscode
ARG WORKSPACES=/workspaces
RUN sudo mkdir -p $WORKSPACES && \
    sudo chown -R vscode:vscode $WORKSPACES
WORKDIR /workspaces

# Install GitHub CLI
RUN curl -fsSL https://cli.github.com/packages/githubcli-archive-keyring.gpg | sudo dd of=/usr/share/keyrings/githubcli-archive-keyring.gpg && \
    sudo chmod go+r /usr/share/keyrings/githubcli-archive-keyring.gpg && \
    echo "deb [arch=$(dpkg --print-architecture) signed-by=/usr/share/keyrings/githubcli-archive-keyring.gpg] https://cli.github.com/packages stable main" | sudo tee /etc/apt/sources.list.d/github-cli.list > /dev/null && \
    sudo apt-get update && \
    sudo apt-get install -y gh

# Install Node Version Manager
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.3/install.sh | bash

# Install Python
RUN sudo apt-get update && \
    sudo apt-get install -y python3 python3-pip python3-venv python-is-python3 && \
    pip3 install --upgrade pip

# Optimize
RUN sudo apt-get autoremove -y && \
    sudo apt-get clean -y && \
    sudo rm -rf /var/lib/apt/lists/*
